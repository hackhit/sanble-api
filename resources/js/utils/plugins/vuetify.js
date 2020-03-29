import Vue from "vue";
import Vuetify from "vuetify";
import colors from "vuetify/es5/util/colors";
import "material-design-icons-iconfont/dist/material-design-icons.css";

Vue.use(Vuetify);

let darkMode = false;
if (localStorage.getItem("darkMode"))
    darkMode = localStorage.getItem("darkMode") == "true" ? true : false;

const opts = {
    theme: {
        dark: darkMode,
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
    },
    icons: {
        iconfont: "md"
    }
};

export default new Vuetify(opts);
