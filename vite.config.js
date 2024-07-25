import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
  plugins: [
    laravel({
      input: [
        //Css
        "resources/css/app.css",

        //Js
        "resources/js/app.js",
        "resources/js/common/deleteConfirm.js",
        "resources/js/common/errorValidation.js",
        "resources/js/common/loading.js",
        "resources/js/common/loginEyes.js",
        "resources/js/common/loginEyesNew.js",
        "resources/js/common/navShowHide.js",
        "resources/js/common/search.js",
        "resources/js/common/sideActive.js",
        "resources/js/common/validateDisappear.js",
        "resources/js/Theme/darkLight.js",
        "resources/js/user/validate.js",
        "resources/js/bootstrap.js",
      ],
      refresh: true,
    }),
  ],
  resolve: {
    alias: {
      $: "jQuery",
    },
  },
});
