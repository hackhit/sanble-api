<template>
  <Layout>
    <v-card width="500">
      <div class="container--logo-auth">
        <figure class="figure--logo-auth">
          <h1>InserteLogo</h1>
        </figure>
      </div>
      <v-container>
        <v-form @submit.prevent="handleSubmit">
          <v-container>
            <v-text-field
              label="Usuario"
              :rules="[rules.required]"
              color="primary"
              v-model="user.username"
              required
            ></v-text-field>
            <v-text-field
              label="Nombre y Apellido"
              :rules="[rules.required]"
              color="primary"
              v-model="user.name"
              required
            ></v-text-field>
            <v-text-field
              label="Correo electrónico"
              :rules="[rules.required, rules.email]"
              color="primary"
              v-model="user.email"
              type="email"
              required
            ></v-text-field>
            <v-text-field
              label="Contraseña"
              :rules="[rules.required, rules.min]"
              :type="showPassword ? 'text' : 'password'"
              :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
              @click:append="showPassword = !showPassword"
              color="primary"
              v-model="user.password"
              required
            ></v-text-field>
            <v-text-field
              label="Confirmar contraseña"
              :rules="[rules.required, rules.min]"
              :type="showConfirmPassword ? 'text' : 'password'"
              :append-icon="showConfirmPassword ? 'mdi-eye' : 'mdi-eye-off'"
              @click:append="showConfirmPassword = !showConfirmPassword"
              color="primary"
              v-model="user.confirmPassword"
              required
            ></v-text-field>
            <!-- <v-alert type="error">I'm an error alert.</v-alert> -->
            <div class="text-center" v-show="isLoading">
              <v-progress-circular indeterminate color="primary"></v-progress-circular>
            </div>
            <div class="my-2 text-center">
              <v-btn color="primary" width="200" type="submit">Registrarse</v-btn>
            </div>
            <div class="my-2 text-center">
              <v-btn link to="/app/auth/login" width="200" text small>Ya poseo una cuenta</v-btn>
            </div>
          </v-container>
        </v-form>
      </v-container>
    </v-card>
  </Layout>
</template>

<script>
// Layout
import Layout from "../../layouts/Session";

// Service
import API from "../../util/services/API";

export default {
  name: "App-Auth-Register-Page",
  components: {
    Layout
  },
  data() {
    return {
      user: {
        username: "",
        name: "",
        email: "",
        password: "",
        confirmPassword: ""
      },
      isLoading: false,
      showPassword: false,
      showConfirmPassword: false,
      rules: {
        required: value => !!value || "Campo Requerido",
        min: v => v.length >= 6 || "Minimo 6 caracteres",
        email: v =>
          /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/.test(
            v
          ) || "Ingrese un correo electrónico válido"
      }
    };
  },
  methods: {
    async handleSubmit() {
      this.isLoading = true;

      const service = new API();

      await service
        .signup(this.user)
        .then(res => {
          console.log(res);
          console.log(res.response);
        })
        .catch(err => {
          console.log(err);
        })
        .finally(() => (this.isLoading = false));
    }
  }
};
</script>