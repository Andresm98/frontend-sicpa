<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Detalle de Usuario
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
                <jet-label value="Nombre: " />
                <jet-input
                  class="mt-1 block w-full"
                  type="text"
                  :value="customer.name"
                />
              </div>
              <div class="mt-4">
                <jet-label value="Email: " />
                <jet-input
                  class="mt-1 block w-full"
                  type="text"
                  :value="customer.email"
                />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";

import JetInputError from "@/Jetstream/InputError";
import JetInput from "@/Jetstream/Input";
import JetLabel from "@/Jetstream/Label";
import JetButton from "@/Jetstream/Button";
export default {
  //DEFINIR LAS PROPIEDADES
  props: ["customer"],
  //ASIGNAR LA DATA A UN FORM
  //IMPORTAR LOS COMPONENTES PERSONALIZADOS DE VUE
  components: {
    AppLayout,
    JetInputError,
    JetInput,
    JetLabel,
    JetButton,
  },
};
</script>
