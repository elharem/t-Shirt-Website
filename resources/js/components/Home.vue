<template>
  <div class="shop">
    <header class="navbar">
      <div class="brand">Tshirt<span>Shop</span></div>

      <nav>
        <a href="#">Accueil</a>
        <a href="#products">Boutique</a>
        <a href="#categories">Catégories</a>
       
      </nav>

      <button class="cart">🛒 Panier</button>
    </header>

    <section class="hero">
      <div class="hero-content">
        <span class="tag">Nouvelle collection 2026</span>
        <h1>Des t-shirts premium pour tous les styles.</h1>
        <p>
          Découvre des t-shirts modernes, confortables et tendances pour homme,
          femme et enfant.
        </p>

        <div class="hero-actions">
          <a href="#products">Voir la boutique</a>
          <button>Découvrir</button>
        </div>
      </div>

      <div class="hero-product">
        <div class="shirt">👕</div>
        <h3>T-shirt premium</h3>
        <p>À partir de 19,99 €</p>
      </div>
    </section>

    <div class="category-grid">
  <button @click="selectedCategory = 'Tous'">Tous</button>

  <button
    v-for="category in categories"
    :key="category.id"
    @click="selectedCategory = category.name"
  >
    {{ category.name }}
  </button>
</div>

    <section id="products" class="products">
      <div class="section-title">
        <h2>Nos produits</h2>
        <p>Collection : {{ selectedCategory }}</p>
      </div>

      <div class="product-grid">
        <div class="product-card" v-for="product in filteredProducts" :key="product.id">
          <div class="product-image">
            <span>👕</span>
          </div>

          <div class="product-info">
            <small>{{ product.category?.name || 'T-shirt' }}</small>
            <h3>{{ product.name }}</h3>
            <p>{{ product.description }}</p>

            <div class="product-bottom">
              <strong>{{ product.price }} €</strong>
              <button>Ajouter</button>
            </div>
          </div>
        </div>
      </div>

      <p v-if="filteredProducts.length === 0" class="empty">
        Aucun produit disponible dans cette catégorie.
      </p>
    </section>

    <section class="advantages">
      <div>
        <h3>🚚 Livraison rapide</h3>
        <p>Expédition en Belgique et en Europe.</p>
      </div>

      <div>
        <h3>🔄 Retours faciles</h3>
        <p>Retour possible sous 14 jours.</p>
      </div>

      <div>
        <h3>⭐ Qualité premium</h3>
        <p>Tissus confortables et résistants.</p>
      </div>
    </section>

    <footer class="footer">
      <div>
        <h2>TshirtShop</h2>
        <p>La boutique moderne de t-shirts tendance.</p>
      </div>

      <div>
        <h4>Navigation</h4>
        <p>Accueil</p>
        <p>Boutique</p>
        <p>Catégories</p>
      </div>

      <div>
        <h4>Contact</h4>
        <p>contact@tshirtshop.be</p>
        <p>Belgique</p>
      </div>
    </footer>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      products: [],
      categories: [],
      selectedCategory: "Tous",
      
    };
  },

  computed: {
    filteredProducts() {
      if (this.selectedCategory === "Tous") {
        return this.products;
      }

      return this.products.filter(
        product => product.category?.name === this.selectedCategory
      );
    }
  },

  mounted() {
  axios.get("/api/products")
    .then(response => {
      this.products = response.data;
    });

  axios.get("/api/categories")
    .then(response => {
      this.categories = response.data;
    });
}
};
</script>

<style scoped>
.shop {
  background: #f7f7f7;
  color: #111;
  min-height: 100vh;
}

.navbar {
  height: 90px;
  padding: 0 80px;
  background: #0b0b0b;
  color: white;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.brand {
  font-size: 30px;
  font-weight: 900;
  color: #ff3b3b;
}

.brand span {
  color: white;
}

.navbar nav {
  display: flex;
  gap: 35px;
}

.navbar a {
  color: white;
  text-decoration: none;
  font-weight: 600;
}

.cart {
  background: white;
  color: #111;
  border: none;
  padding: 13px 25px;
  border-radius: 30px;
  font-weight: 700;
}

.hero {
  padding: 90px 80px;
  background: linear-gradient(135deg, #ffffff, #e9e9e9);
  display: grid;
  grid-template-columns: 1.4fr 0.8fr;
  align-items: center;
  gap: 70px;
}

.tag {
  background: #111;
  color: white;
  padding: 10px 18px;
  border-radius: 25px;
  font-weight: 700;
}

.hero h1 {
  margin-top: 25px;
  font-size: 64px;
  line-height: 1.05;
  max-width: 780px;
}

.hero p {
  margin: 25px 0;
  font-size: 20px;
  color: #555;
  max-width: 600px;
}

.hero-actions {
  display: flex;
  gap: 18px;
}

.hero-actions a,
.hero-actions button {
  padding: 15px 28px;
  border-radius: 30px;
  border: none;
  font-weight: 800;
  text-decoration: none;
}

.hero-actions a {
  background: #ff3b3b;
  color: white;
}

.hero-actions button {
  background: white;
  color: #111;
}

.hero-product {
  background: white;
  padding: 50px;
  border-radius: 35px;
  text-align: center;
  box-shadow: 0 25px 60px rgba(0,0,0,0.12);
}

.shirt {
  font-size: 130px;
}

.categories,
.products,
.advantages {
  padding: 80px;
}

.section-title h2 {
  font-size: 40px;
}

.section-title p {
  color: #666;
  margin-top: 8px;
}

.category-grid {
  margin-top: 35px;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 25px;
}

.category-grid button {
  height: 120px;
  background: #111;
  color: white;
  border: none;
  border-radius: 24px;
  font-size: 22px;
  font-weight: 800;
  cursor: pointer;
  transition: 0.3s;
}

.category-grid button:hover {
  background: #ff3b3b;
  transform: translateY(-5px);
}

.product-grid {
  margin-top: 45px;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 30px;
}

.product-card {
  background: white;
  border-radius: 24px;
  overflow: hidden;
  box-shadow: 0 12px 35px rgba(0,0,0,0.08);
  transition: 0.3s;
}

.product-card:hover {
  transform: translateY(-8px);
}

.product-image {
  height: 230px;
  background: linear-gradient(135deg, #f0f0f0, #dcdcdc);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 75px;
}

.product-info {
  padding: 24px;
}

.product-info small {
  color: #ff3b3b;
  font-weight: 900;
  text-transform: uppercase;
}

.product-info h3 {
  margin: 10px 0;
  font-size: 22px;
}

.product-info p {
  color: #666;
  min-height: 45px;
}

.product-bottom {
  margin-top: 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.product-bottom strong {
  font-size: 24px;
}

.product-bottom button {
  background: #111;
  color: white;
  border: none;
  padding: 11px 18px;
  border-radius: 25px;
  font-weight: 700;
}

.advantages {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 25px;
}

.advantages div {
  background: white;
  padding: 35px;
  border-radius: 24px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.06);
}

.footer {
  padding: 60px 80px;
  background: #0b0b0b;
  color: white;
  display: grid;
  grid-template-columns: 2fr 1fr 1fr;
  gap: 40px;
}

.footer p {
  color: #bbb;
}

.empty {
  margin-top: 30px;
  color: #777;
}

@media (max-width: 900px) {
  .navbar,
  .hero,
  .categories,
  .products,
  .advantages,
  .footer {
    padding: 35px;
  }

  .hero,
  .product-grid,
  .category-grid,
  .advantages,
  .footer {
    grid-template-columns: 1fr;
  }

  .hero h1 {
    font-size: 42px;
  }
}
</style>