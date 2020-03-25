import Vue from "vue";
import Vuetify from "vuetify";
import colors from "vuetify/es5/util/colors";

Vue.use(Vuetify);

const opts = {
    theme: {
        dark: false,
        themes: {
            dark: {
                primary: "#FF7315",
                accent: colors.grey.darken3,
                secondary: "#3A3535",
                info: "#FFCC80",
                warning: colors.amber.base,
                error: colors.deepOrange.accent4,
                success: colors.green.accent3
            },
            light: {
                primary: "#FF7315",
                accent: colors.grey.darken3,
                secondary: "#3A3535",
                info: "#FFCC80",
                warning: colors.amber.base,
                error: colors.deepOrange.accent4,
                success: colors.green.accent3
            }
        }
    }
};

export default new Vuetify(opts);
