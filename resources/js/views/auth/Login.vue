<template>
  <Layout>
    <v-card width="500">
      <div class="container--logo-auth">
        <figure class="figure--logo-auth">
          <h1>InserteLogo</h1>
        </figure>
      </div>
      <v-container>
        <v-form>
          <v-container>
            <v-text-field
              label="Usuario"
              :rules="[rules.required]"
              color="primary"
              v-model="user.username"
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
            <div class="my-2 text-center">
              <v-btn color="primary" width="200">Iniciar Sesión</v-btn>
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
      }
    };
  }
};
</script>