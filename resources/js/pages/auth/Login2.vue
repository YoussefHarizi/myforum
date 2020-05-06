<template>
    <div>
        <img
            src="images/wave.png"
            class="fixed hidden lg:block inset-0 h-full"
            style="z-index: -1;"
        />
        <div
            class="w-screen h-screen flex flex-col justify-center items-center lg:grid lg:grid-cols-2"
        >
            <img
                src="images/unlock.svg"
                class="hidden lg:block w-1/2 hover:scale-150 transition-all duration-500 transform mx-auto"
            />
            <form
                class="flex flex-col justify-center items-center w-2/3"
                @submit.prevent="login"
            >
                <img :src="imgUser" class="w-32" />
                <h2
                    class="my-8 font-display font-bold text-3xl text-gray-700 text-center"
                >
                    Welcome to Youna Forum
                </h2>
                <div class="relative w-full text-center">
                    <i
                        class="fa fa-user absolute text-primarycolor text-xl"
                    ></i>
                    <input
                        type="text"
                        v-model="form.email"
                        placeholder="username"
                        class="w-9/12 pl-8 border-b-2 font-display focus:outline-none focus:border-primarycolor transition-all duration-500  text-lg"
                    />
                </div>
                <div class="relative mt-8 w-full text-center">
                    <i
                        class="fa fa-lock absolute text-primarycolor text-xl"
                    ></i>
                    <input
                        type="password"
                        v-model="form.password"
                        :class="{ 'is-invalid': form.errors.has('password') }"
                        placeholder="password"
                        class="w-9/12 pl-8 border-b-2 font-display focus:outline-none focus:border-primarycolor transition-all duration-500  text-lg"
                    />
                    <has-error :form="form" field="password"></has-error>
                </div>
                <div class="relative mt-8 text-left w-9/12">
                    <label
                        for="remember"
                        class="inline-flex items-center text-sm text-gray-700"
                    >
                        <input
                            type="checkbox"
                            v-model="form.remember"
                            name="remember"
                            id="remember"
                            class="form-checkbox text-primarycolor"
                        />
                        <span class="ml-2 text-gray-600">Remember Me</span>
                    </label>
                </div>
                <div
                    class="flex items-baseline mt-8 justify-between md:w-9/12 sm:w-full"
                >
                    <button
                        type="submit"
                        class="inline-block py-3 px-12 bg-primarycolor rounded-full text-white text-lg transform hover:translate-y-1 transition-all duration-500"
                    >
                        Login
                    </button>
                    <a
                        href="#"
                        class="self-end text-gray-600 block py-3 hover:text-primarycolor"
                        >Forgot password?</a
                    >
                </div>
                <div class="text-left mt-8 sm:w-full md:w-9/12">
                    <a
                        href="/login/github"
                        class=" inline-block border-none rounded-full bg-gray-700 px-6 py-3 text-white text-lg transform hover:translate-y-1 transition-all duration-500"
                        >Github <i class="fab fa-github"></i>
                    </a>
                    <a
                        href="/login/facebook"
                        class=" inline-block border-none rounded-full bg-blue-700 px-6 py-3 text-white text-lg transform hover:translate-y-1 transition-all duration-500"
                        >Facebook
                        <i class="fab fa-facebook" aria-hidden="true"></i
                    ></a>
                </div>
                <p class="pt-4 m-8 text-gray-600 w-9/12 text-center">
                    Don't have an account?
                    <a
                        class="text-primaryColor font-bold underline"
                        href="/register"
                        >register</a
                    >
                </p>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: new Form({
                email: "",
                password: "",
                remember: false
            }),
            imgUser: "/images/avatar.svg"
        };
    },
    methods: {
        async login() {
            try {
                const { data } = await this.form.post("/api/v1/auth/login");
                this.$store.dispatch("auth/saveToken", {
                    token: data.access_token,
                    remember: this.remember
                });
            } catch (error) {
                console.log(error);
            }
            try {
                await this.$store.dispatch("auth/fetchUser");
                this.$router.push({ name: "home" });
            } catch (error) {}
        }
    }
};
</script>

<style lang="scss" scoped></style>
