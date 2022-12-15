<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Editar Usuario
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="p-6 sm:px 20 bg-white border-b border-gray-200">
            <!-- Crear en enlace de acceso con inertia link -->
            <!-- {{ errors }} -->

            <form @submit.prevent="submit">
              <!-- TODO:: <div class="text-red-600" v-if="errors.name">
                {{ errors.name }}
              </div> -->
              <!-- <input type="text" v-model="name" /> -->

              <div class="mt-4">
                <jet-label value="Nombre" />
                <jet-input-error :message="errors.name" />
                <jet-input
                  class="mt-1 block w-full"
                  type="text"
                  v-model="form.name"
                />
              </div>
              <div class="mt-4">
                <jet-label value="Email" />
                <jet-input-error :message="errors.email" />
                <jet-input
                  class="mt-1 block w-full"
                  type="text"
                  v-model="form.email"
                />
              </div>
              <div class="mt-4">
                <jet-label value="Password" />
                <jet-input-error :message="errors.password" />
                <jet-input
                  class="mt-1 block w-full"
                  type="password"
                  v-model="form.password"
                />
              </div>

              <jet-button type="submit" class="mt-2">
                Editar el Usuario
              </jet-button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";

import { Inertia } from "@inertiajs/inertia";

import JetInputError from "@/Jetstream/InputError";
import JetInput from "@/Jetstream/Input";
import JetLabel from "@/Jetstream/Label";
import JetButton from "@/Jetstream/Button";
export default {
  //DEFINIR LAS PROPIEDADES
  props: ["customer", "errors"],
  //ASIGNAR LA DATA A UN FORM
  data() {
    return {
      //   name: null,
      //   email: null,
      //   password: null,

      //Agrupar en un objeto
      form: {
        name: this.customer.name,
        email: this.customer.email,
        password: "",
      },
    };
  },
  //IMPORTAR LOS COMPONENTES PERSONALIZADOS DE VUE
  components: {
    AppLayout,
    JetInputError,
    JetInput,
    JetLabel,
    JetButton,
  },
  //CARGAR LOS METODOS DE INERTIA
  methods: {
    submit() {
      //   Inertia.post(route("users.store"), {
      //     name: this.name,
      //     email: this.email,
      //     password: this.password,
      //   });
      Inertia.put(
        route("users.update", { user: this.customer }),
        this.form
      );
    },
  },
};
</script>
