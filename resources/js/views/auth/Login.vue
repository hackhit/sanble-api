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
              :disabled="isLoading"
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
              :disabled="isLoading"
              required
            ></v-text-field>
            <v-alert v-show="errors" type="error">
              <ul>
                <li v-for="(error,i) in errors" :key="i">{{error}}</li>
              </ul>
            </v-alert>
            <div class="my-2 text-center">
              <v-btn color="primary" width="200" type="submit" :loading="isLoading">Iniciar Sesión</v-btn>
            </div>
            <div class="my-2 text-center">
              <v-btn link to="/app/auth/register" width="200" small text>Registrarse</v-btn>
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

// Utils
import formatErrorsForm from "../../util/errors/formatErrorsForm";

export default {
  name: "App-Auth-Login-Page",
  components: {
    Layout
  },
  data() {
    return {
      user: {
        username: "",
        password: ""
      },
      showPassword: false,
      rules: {
        required: value => !!value || "Campo Requerido",
        min: v => v.length >= 6 || "Minimo 6 caracteres"
      },
      errors: null,
      isLoading: false
    };
  },
  methods: {
    async handleSubmit() {
      this.isLoading = true;
      this.errors = null;

      const service = new API();
      await service
        .login(this.user)
        .then(res => {
          console.log(res);
          console.log(res.response);
        })
        .catch(err => {
          if (err.response.status == 422) {
            this.errors = formatErrorsForm(err.response.data.errors);
          } else if (err.response.status == 401) {
            console.log(err.response);
          } else {
            this.errors = ["Unknown error"];
          }
        })
        .finally(() => (this.isLoading = false));
    }
  }
};
</script>