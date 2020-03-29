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
            ></v-text-field>
            <v-text-field
              :label="$t('input.nameUser')"
              :rules="[rules.required]"
              color="primary"
              v-model="user.name"
              :disabled="isLoading"
              required
            ></v-text-field>
            <v-text-field
              :label="$t('input.email')"
              :rules="[rules.required, rules.email]"
              color="primary"
              v-model="user.email"
              :disabled="isLoading"
              type="email"
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
            <v-text-field
              :label="$t('input.confirmPassword')"
              :rules="[rules.required, rules.min]"
              :type="showConfirmPassword ? 'text' : 'password'"
              :append-icon="showConfirmPassword ? 'visibility' : 'visibility_off'"
              @click:append="showConfirmPassword = !showConfirmPassword"
              color="primary"
              v-model="user.confirmPassword"
              :disabled="isLoading"
              required
            ></v-text-field>
            <v-alert v-show="errors" type="error">
              <ul>
                <li v-for="(error,i) in errors" :key="i">{{error}}</li>
              </ul>
            </v-alert>
            <div class="text-center" v-show="isLoading">
              <v-progress-circular indeterminate color="primary"></v-progress-circular>
            </div>
            <div class="my-2 text-center">
              <v-btn
                color="primary"
                width="200"
                type="submit"
                :loading="isLoading"
              >{{$t('btn.register')}}</v-btn>
            </div>
            <div class="my-2 text-center">
              <v-btn
                link
                to="/app/auth/login"
                width="200"
                text
                small
              >{{$t('btn.alreadyHaveAccount')}}</v-btn>
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
        required: value => !!value || this.rulesRequired,
        min: v => v.length >= 6 || this.min6Char,
        email: v =>
          /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/.test(
            v
          ) || this.emailValid
      },
      errors: null
    };
  },
  computed: {
    rulesRequired() {
      return this.$t("rules.required");
    },
    min6Char() {
      return this.$t("rules.min6Char");
    },
    emailValid() {
      return this.$t("rules.emailValid");
    }
  },
  methods: {
    async handleSubmit() {
      this.isLoading = true;
      this.errors = null;

      if (this.user.password != this.user.confirmPassword) {
        this.errors = ["The password does not match"];
        this.isLoading = false;
      } else {
        const service = new API();
        await service
          .signup(this.user)
          .then(res => {
            console.log(res);
            console.log(res.response);
          })
          .catch(err => {
            if (err.response.status == 422) {
              this.errors = formatErrorsForm(err.response.data.errors);
            } else {
              this.errors = ["Unknown error"];
            }
          })
          .finally(() => (this.isLoading = false));
      }
    }
  }
};
</script>