
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px 20 bg-white border-b border-gray-200">
              <!-- component -->
              <section class="">
                <header class="px-5 py-4 border-b border-gray-100">
                  <!-- Crear en enlace de acceso con inertia link -->
                  <Link
                    :href="route('users.create')"
                    class="
                      p-2
                      pl-5
                      pr-5
                      bg-blue-500
                      border-2 border-blue-500
                      text-white text-sm
                      rounded-lg
                      hover:bg-blue-500 hover:text-gray-100
                      focus:border-4 focus:border-blue-300
                      mr-2
                      mt-4
                    "
                    >Crear usuarios</Link
                  >
                </header>

                <table class="min-w-full leading-normal">
                  <thead>
                    <tr>
                      <th
                        class="
                          px-5
                          py-3
                          border-b-2 border-gray-200
                          bg-gray-100
                          text-left text-xs
                          font-semibold
                          text-gray-600
                          uppercase
                          tracking-wider
                        "
                      >
                        FOTO
                      </th>
                      <th
                        class="
                          px-5
                          py-3
                          border-b-2 border-gray-200
                          bg-gray-100
                          text-left text-xs
                          font-semibold
                          text-gray-600
                          uppercase
                          tracking-wider
                        "
                      >
                        Nombre
                      </th>
                      <th
                        class="
                          px-5
                          py-3
                          border-b-2 border-gray-200
                          bg-gray-100
                          text-left text-xs
                          font-semibold
                          text-gray-600
                          uppercase
                          tracking-wider
                        "
                      >
                        Correo
                      </th>
                      <th
                        class="
                          px-5
                          py-3
                          border-b-2 border-gray-200
                          bg-gray-100
                          text-center text-xs
                          font-semibold
                          text-gray-600
                          uppercase
                          tracking-wider
                        "
                      >
                        Acciones
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="u in users" :key="u.id">
                      <td class="px-5 py-5 bg-white text-sm">
                        <div class="flex items-center">
                          <div class="flex-shrink-0 w-10 h-10">
                            <img
                              class="w-full h-full rounded-full"
                              src="https://images.unsplash.com/photo-1522609925277-66fea332c575?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&h=160&w=160&q=80"
                              alt=""
                            />
                          </div>
                          <div class="ml-3">
                            <p class="text-gray-900 whitespace-no-wrap">
                              {{ u.id }}
                            </p>
                          </div>
                        </div>
                      </td>
                      <td class="px-5 py-5 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                          {{ u.name }}
                        </p>
                      </td>
                      <td class="px-5 py-5 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                          {{ u.email }}
                        </p>
                      </td>
                      <td class="px-5 py-5 bg-white text-sm">
                        <Link
                          class="
                            p-2
                            pl-2
                            pr-2
                            bg-transparent
                            border-2 border-green-500
                            text-green-500 text-md
                            rounded-lg
                            hover:bg-green-500 hover:text-gray-100
                            focus:border-4 focus:border-green-300
                            mr-2
                          "
                          :href="route('users.show', { user: u.id })"
                          preserve-state
                        >
                          Mostrar
                        </Link>

                        <Link
                          class="
                            p-2
                            pl-5
                            pr-5
                            bg-transparent
                            border-2 border-blue-300
                            text-blue-500 text-md
                            rounded-lg
                            hover:bg-blue-300 hover:text-gray-100
                            focus:border-4 focus:border-blue-300
                            mr-2
                          "
                          :href="route('users.edit', { user: u.id })"
                          preserve-state
                        >
                          Editar
                        </Link>

                        <jet-action-section>
                          <template #content>
                            <jet-danger-button @click="confirmTeamDeletion">
                              Delete Team
                            </jet-danger-button>

                            <!-- Delete Team Confirmation Modal -->
                            <jet-confirmation-modal
                              :show="confirmingTeamDeletion"
                              @close="confirmingTeamDeletion = false"
                            >
                              <template #title> Delete Team </template>

                              <template #content>
                                Are you sure you want to delete this team? Once a
                                team is deleted, all of its resources and data
                                will be permanently deleted.
                              </template>

                              <template #footer>
                                <jet-secondary-button
                                  @click="confirmingTeamDeletion = false"
                                >
                                  Cancel
                                </jet-secondary-button>

                                <jet-danger-button
                                  class="ml-3"
                                  @click="deleteTeam"
                                  :class="{ 'opacity-25': form.processing }"
                                  :disabled="form.processing"
                                >
                                  Delete Team
                                </jet-danger-button>
                              </template>
                            </jet-confirmation-modal>
                          </template>
                        </jet-action-section>

                        <span
                          class="
                            relative
                            inline-block
                            px-3
                            py-1
                            font-semibold
                            text-yellow-900
                            leading-tight
                          "
                        >
                          <span
                            aria-hidden
                            class="
                              absolute
                              inset-0
                              bg-yellow-200
                              opacity-50
                              rounded-full
                            "
                          ></span>
                          <span class="relative">Inactive</span>
                        </span>
                      </td>
                    </tr>
                  </tbody>
                </table>

                <div class="flex flex-col justify-center w-full">
                  <!-- Table -->
                  <div
                    class="
                      w-full
                      max-w-2xl
                      mx-auto
                      bg-white
                      shadow-lg
                      rounded-sm
                      border border-gray-200
                    "
                  ></div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
