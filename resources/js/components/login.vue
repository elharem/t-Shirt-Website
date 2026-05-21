<template>
  <div class="login-page">
    <div class="login-card">
      <div class="left">
        <h1>TshirtShop</h1>
        <p>Accès administrateur</p>
        <span>Gérez vos produits, catégories et commandes.</span>
      </div>

      <div class="right">
        <h2>Connexion admin</h2>

        <input v-model="email" type="email" placeholder="Adresse email" />
        <input v-model="password" type="password" placeholder="Mot de passe" />

        <button @click="login">Se connecter</button>

        <p class="hint">Espace réservé à l’administrateur.</p>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      email: "",
      password: ""
    };
  },
  methods: {
    login() {
      axios.post("/api/login", {
        email: this.email,
        password: this.password
      })
      .then((res) => {
        localStorage.setItem("token", res.data.token);
        this.$router.push("/admin");
      })
      .catch(() => {
        alert("Erreur login");
      });
    }
  }
};
</script>

<style scoped>
.login-page {
  min-height: 100vh;
  background: linear-gradient(135deg, #111, #2a2a2a);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 40px;
}

.login-card {
  width: 950px;
  min-height: 520px;
  background: white;
  border-radius: 28px;
  overflow: hidden;
  display: grid;
  grid-template-columns: 1fr 1fr;
  box-shadow: 0 25px 80px rgba(0,0,0,0.35);
}

.left {
  background: #0b0b0b;
  color: white;
  padding: 60px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.left h1 {
  font-size: 42px;
  color: #ff3b3b;
}

.left p {
  font-size: 28px;
  margin: 20px 0;
  font-weight: 700;
}

.left span {
  color: #bbb;
  line-height: 1.6;
}

.right {
  padding: 60px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.right h2 {
  font-size: 32px;
  margin-bottom: 30px;
}

input {
  width: 100%;
  padding: 15px 18px;
  margin-bottom: 15px;
  border: 1px solid #ddd;
  border-radius: 14px;
  font-size: 15px;
}

button {
  margin-top: 10px;
  padding: 15px;
  border: none;
  background: #ff3b3b;
  color: white;
  border-radius: 14px;
  font-size: 16px;
  font-weight: 800;
  cursor: pointer;
}

.hint {
  margin-top: 20px;
  color: #777;
  font-size: 14px;
}

@media (max-width: 800px) {
  .login-card {
    grid-template-columns: 1fr;
  }

  .left {
    display: none;
  }
}
</style>