module.exports = {
    purge: ["./resources/views/**/*.blade.php", "./resources/css/**/*.css"],
    theme: {
        extend: {
            colors: {
                primarycolor: "#F9A826"
            }
        },
        fontFamily: {
            display: ["Nunito", "sans-serif"]
        }
    },
    variants: {},
    plugins: [require("@tailwindcss/custom-forms")]
};
