const InitializePreferencesStore = store => {
    let lang = "es";
    if (localStorage.getItem("lang")) lang = localStorage.getItem("lang");
    store.dispatch("setLangAction", lang);

    let darkMode = false;
    if (localStorage.getItem("darkMode"))
        darkMode = localStorage.getItem("darkMode") == "true" ? true : false;
    store.dispatch("setDarkModeAction", darkMode);
};

export default InitializePreferencesStore;
