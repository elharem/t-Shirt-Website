<template>
  <div class="admin-layout">
    <aside class="sidebar">
      <h2>TshirtShop</h2>

      <button @click="activePage = 'dashboard'" :class="{ active: activePage === 'dashboard' }">
        📊 Dashboard
      </button>

      <button @click="activePage = 'products'" :class="{ active: activePage === 'products' }">
        👕 Produits
      </button>

      <button @click="activePage = 'categories'" :class="{ active: activePage === 'categories' }">
        🏷️ Catégories
      </button>

      <button @click="activePage = 'orders'" :class="{ active: activePage === 'orders' }">
        🛒 Commandes
      </button>

      <button @click="activePage = 'users'" :class="{ active: activePage === 'users' }">
        👤 Utilisateurs
      </button>

      <button class="logout" @click="logout">Déconnexion</button>
    </aside>

    <main class="content">
      <section v-if="activePage === 'dashboard'">
        <h1>Dashboard admin</h1>

        <div class="stats">
          <div class="card">
            <h3>Produits</h3>
            <p>{{ products.length }}</p>
          </div>

          <div class="card">
            <h3>Commandes</h3>
            <p>24</p>
          </div>

          <div class="card">
            <h3>Utilisateurs</h3>
            <p>12</p>
          </div>

          <div class="card money">
            <h3>Chiffre d’affaires</h3>
            <p>4 850 €</p>
            <span>+12% ce mois-ci</span>
          </div>

          <div class="card money">
            <h3>Bénéfices</h3>
            <p>2 140 €</p>
            <span>Après frais</span>
          </div>

          <div class="card money">
            <h3>Panier moyen</h3>
            <p>78 €</p>
            <span>Par commande</span>
          </div>
        </div>
      </section>

      <section v-if="activePage === 'products'" class="panel">
        <h1>Gestion des produits</h1>

        <div class="form">
          <input v-model="newProduct.name" placeholder="Nom du produit" />
          <input v-model="newProduct.description" placeholder="Description" />
          <input v-model="newProduct.price" type="number" placeholder="Prix" />
          <input v-model="newProduct.stock" type="number" placeholder="Stock" />

<select v-model="newProduct.category_id">
  <option
    v-for="category in categories"
    :key="category.id"
    :value="category.id"
  >
    {{ category.name }}
  </option>
</select>
          <button @click="addProduct">Ajouter</button>
        </div>

        <table>
          <thead>
            <tr>
              <th>Nom</th>
              <th>Description</th>
              <th>Prix</th>
              <th>Stock</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="product in products" :key="product.id">
              <td>{{ product.name }}</td>
              <td>{{ product.description }}</td>
              <td>{{ product.price }} €</td>
              <td>{{ product.stock }}</td>
            </tr>
          </tbody>
        </table>
      </section>

      <section v-if="activePage === 'categories'" class="panel">
  <h1>Gestion des catégories</h1>

  <div class="form">
    <input v-model="newCategory" placeholder="Nom de la catégorie" />
    <button @click="addCategory">Ajouter</button>
  </div>

  <div class="category-list">
    <div class="category-card" v-for="category in categories" :key="category.id">
      <span>{{ category.name }}</span>
      <button @click="deleteCategory(category.id)">Supprimer</button>
    </div>
  </div>
</section>

      <section v-if="activePage === 'orders'" class="panel">
        <h1>Commandes</h1>

        <table>
          <thead>
            <tr>
              <th>N° commande</th>
              <th>Client</th>
              <th>Total</th>
              <th>Statut</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>#001</td>
              <td>Client test</td>
              <td>78 €</td>
              <td><span class="status">Payée</span></td>
            </tr>
          </tbody>
        </table>
      </section>

      <section v-if="activePage === 'users'" class="panel">
        <h1>Utilisateurs</h1>

        <table>
          <thead>
            <tr>
              <th>Nom</th>
              <th>Email</th>
              <th>Rôle</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>Admin</td>
              <td>simo0ayoub@gmail.com</td>
              <td>Administrateur</td>
            </tr>
          </tbody>
        </table>
      </section>
    </main>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
  return {
    activePage: "dashboard",
    products: [],

    newProduct: {
      name: "",
      description: "",
      price: "",
      stock: "",
      category_id: 1
    },

    categories: [],
    newCategory: ""
  };
},

  mounted() {
    this.loadProducts();
    this.loadProducts();
    this.loadCategories();
  },

  methods: {
    loadProducts() {
      axios.get("/api/products").then((response) => {
        this.products = response.data;
      });
    },

    addProduct() {
      axios.post("/api/products", this.newProduct).then(() => {
        alert("Produit ajouté !");
        this.loadProducts();

        this.newProduct = {
          name: "",
          description: "",
          price: "",
          stock: "",
          category_id: 1
        };
      });
    },

    logout() {
      localStorage.removeItem("token");
      this.$router.push("/login");
    },

    loadCategories() {
      axios.get("/api/categories").then((response) => {
        this.categories = response.data;
      });
    },

    addCategory() {
      if (!this.newCategory) return;

      axios.post("/api/categories", {
        name: this.newCategory
      }).then(() => {
        this.newCategory = "";
        this.loadCategories();
      });
    },

    deleteCategory(id) {
      axios.delete("/api/categories/" + id).then(() => {
        this.loadCategories();
      });
    }
  }
};
</script>

<style scoped>
.admin-layout {
  min-height: 100vh;
  display: flex;
  background: #f4f6f8;
  font-family: Arial, sans-serif;
}

.sidebar {
  width: 270px;
  background: #0b0b0b;
  color: white;
  padding: 30px 20px;
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.sidebar h2 {
  color: #ff3b3b;
  margin-bottom: 30px;
  font-size: 28px;
}

.sidebar button {
  background: transparent;
  color: white;
  border: none;
  text-align: left;
  padding: 14px 16px;
  border-radius: 12px;
  font-size: 17px;
  font-weight: 700;
  cursor: pointer;
  transition: 0.2s;
}

.sidebar button:hover,
.sidebar button.active {
  background: #ff3b3b;
}

.logout {
  margin-top: auto;
  background: #222 !important;
}

.content {
  flex: 1;
  padding: 35px;
}

h1 {
  margin-bottom: 25px;
}

.stats {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 20px;
}

.card,
.panel {
  background: white;
  padding: 25px;
  border-radius: 20px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.06);
}

.card p {
  font-size: 34px;
  font-weight: bold;
  color: #ff3b3b;
}

.money {
  background: linear-gradient(135deg, #111, #1f1f1f);
  color: white;
}

.money p {
  color: #4ade80;
}

.money span {
  color: #ccc;
}

.form {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 15px;
  margin-bottom: 30px;
}

input,
select {
  padding: 14px;
  border-radius: 12px;
  border: 1px solid #ddd;
}

.form button {
  background: #111;
  color: white;
  border: none;
  border-radius: 12px;
  font-weight: 700;
}

table {
  width: 100%;
  border-collapse: collapse;
  background: white;
}

th,
td {
  padding: 14px;
  border-bottom: 1px solid #eee;
  text-align: left;
}

.category-list {
  display: flex;
  gap: 20px;
}

.category-card {
  background: #111;
  color: white;
  padding: 35px;
  border-radius: 18px;
  min-width: 180px;
  text-align: center;
  font-weight: bold;
}

.status {
  background: #dcfce7;
  color: #166534;
  padding: 6px 12px;
  border-radius: 20px;
}
</style>