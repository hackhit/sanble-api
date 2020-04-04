<template>
  <Layout>
    <v-card width="500">
      <div class="container--logo-auth">
        <figure class="figure--logo-auth">
          <img src="/storage/media/logo.png" alt="Sanble" />
        </figure>
      </div>
      <v-container>
        <v-form @submit.prevent="handleSubmit">
          <v-container>
            <v-text-field
              :label="$t('input.username')"
              :rules="[rules.required]"
              color="primary"
              v-model="user.username"
              :disabled="isLoading"
              required
            ></v-text-field>
            <v-text-field
              :label="$t('input.password')"
              :rules="[rules.required, rules.min]"
              :type="showPassword ? 'text' : 'password'"
              :append-icon="showPassword ? 'visibility' : 'visibility_off'"
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
              <v-btn
                color="primary"
                width="200"
                type="submit"
                :loading="isLoading"
              >{{ $t('btn.login') }}</v-btn>
            </div>
            <div class="my-2 text-center">
              <v-btn link to="/app/auth/register" width="200" small text>{{ $t('btn.register') }}</v-btn>
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

// Services
import API from "../../utils/services/API";

// Utils
import formatErrorsForm from "../../utils/errors/formatErrorsForm";

export default {
  name: "Auth-Login-Page",
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
        required: value => !!value || this.rulesRequired,
        min: v => v.length >= 6 || this.min6Char
      },
      errors: null,
      isLoading: false
    };
  },
  computed: {
    rulesRequired() {
      return this.$t("rules.required");
    },
    min6Char() {
      return this.$t("rules.min6Char");
    }
  },
  methods: {
    async handleSubmit() {
      this.isLoading = true;
      this.errors = null;

      const services = new API();
      await services
        .login(this.user)
        .then(({ data }) => {
          this.$cookies.set("access-token", data.meta.access_token);
          this.$store.dispatch("setUserAction", data.data);
          this.$store.dispatch("setRolesAction", data.data.roles);
          this.$store.dispatch("setTokenAction", data.meta.access_token);
          this.$router.replace("/app");
        })
        .catch(err => {
          if (err.response.status == 422) {
            this.errors = formatErrorsForm(err.response.data.errors);
          } else if (err.response.status == 401) {
            this.errors = [this.$t("auth.wrongUsernamePassword")];
          } else {
            this.errors = ["Unknown error"];
          }
          setTimeout(() => (this.errors = null), 5000);
        })
        .finally(() => (this.isLoading = false));
    }
  }
};
</script>