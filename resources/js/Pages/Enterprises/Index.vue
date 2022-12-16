<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Enterprises
      </h2>
      <div>
        <label class="text-blue-500 mt-2 mb-3">
            Welcome: {{ $page.props.user.name }}</label
        >
      </div>
    </template>
    <div class="ml-6">
      <br />
      <br />
      <jet-secondary-button type="submit" @click="confirmationCreateEnterprise"
        >Create Enterprise</jet-secondary-button
      >
      <br />
      <br />
    </div>
    <section class="py-1 bg-gray">
      <div class="w-full lg:w-full">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6">
          <div class="overflow-hidden">
            <small class="ml-6">
              {{ listEnterprises.length }} records found.</small
            >
            <div class="py-2">
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div
                    class="
                      py-2
                      align-middle
                      inline-block
                      min-w-full
                      sm:px-6
                      lg:px-8
                    "
                  >
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-blue-100">
                        <tr>
                          <th
                            scope="col"
                            class="
                              text-left text-xs
                              font-medium
                              text-black
                              uppercase
                              tracking-wider
                            "
                          >
                            <span
                              class="
                                inline-flex
                                px-6
                                py-3
                                w-full
                                justify-between
                              "
                              >Name/Address/Phone
                            </span>
                          </th>
                          <th
                            scope="col"
                            class="
                              text-left text-xs
                              font-medium
                              text-black
                              uppercase
                              tracking-wider
                            "
                          >
                            <span
                              class="
                                inline-flex
                                px-6
                                py-3
                                w-full
                                justify-between
                              "
                              >Created Date/By
                            </span>
                          </th>
                          <th
                            scope="col"
                            class="
                              text-left text-xs
                              font-medium
                              text-black
                              uppercase
                              tracking-wider
                            "
                          >
                            <span
                              class="
                                inline-flex
                                px-6
                                py-3
                                w-full
                                justify-between
                              "
                              >Modified Date/By
                            </span>
                          </th>
                          <th
                            scope="col"
                            class="
                              px-6
                              py-3
                              text-left text-xs
                              font-medium
                              text-black
                              uppercase
                              tracking-wider
                            "
                          >
                            State
                          </th>
                          <th
                            scope="col"
                            class="
                              px-6
                              py-3
                              text-left text-xs
                              font-medium
                              text-black
                              uppercase
                              tracking-wider
                            "
                          >
                            Operations
                          </th>
                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">
                        <tr
                          v-for="enterprise in listEnterprises"
                          :key="enterprise.id"
                        >
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="flex-shrink-0 h-10 w-10">
                                <img
                                  class="h-10 w-10 rounded-full"
                                  src="https://cdn-icons-png.flaticon.com/512/3328/3328278.png"
                                  alt=""
                                />
                              </div>
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                  Name: {{ enterprise.name }}
                                </div>
                                <div class="text-sm text-gray-500">
                                  Address: {{ enterprise.address }}
                                </div>
                                <div class="text-sm text-gray-500">
                                  Phone: {{ enterprise.phone }}
                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                              <div class="text-sm text-gray-500">
                                {{ enterprise.createdBy }}
                              </div>
                              <br />

                              <div class="text-sm text-gray-500">
                                {{ enterprise.createdDate }}
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                              <div class="text-sm text-gray-500">
                                {{ enterprise.modifiedBy }}
                              </div>
                              <br />

                              <div class="text-sm text-gray-500">
                                {{ enterprise.modifiedDate }}
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div>
                              <div v-if="enterprise.status == 1">
                                <span
                                  class="
                                    px-2
                                    inline-flex
                                    text-xs
                                    leading-5
                                    font-semibold
                                    rounded-full
                                    bg-green-100
                                    text-green-800
                                  "
                                >
                                  Active
                                </span>
                              </div>
                              <div v-if="enterprise.status == 0">
                                <span
                                  class="
                                    px-2
                                    inline-flex
                                    text-xs
                                    leading-5
                                    font-semibold
                                    rounded-full
                                    bg-red-100
                                    text-red-800
                                  "
                                >
                                  Disabled
                                </span>
                              </div>
                            </div>
                          </td>
                          <td
                            class="
                              px-3
                              py-4
                              whitespace-nowrap
                              text-right text-sm
                              font-medium
                            "
                          >
                            <div class="mx-auto flex gap-10">
                              <button
                                @click="
                                  confirmationEnterpriseUpdate(enterprise)
                                "
                              >
                                <div class="w-auto h-auto">
                                  <div class="flex-1 h-full">
                                    <div
                                      class="
                                        flex
                                        items-center
                                        justify-center
                                        flex-1
                                        h-full
                                        p-2
                                        border border-green-500
                                        text-white
                                        shadow
                                        rounded-lg
                                        hover:bg-green-50 hover:text-zinc-300
                                      "
                                    >
                                      <div class="relative">
                                        <svg
                                          xmlns="http://www.w3.org/2000/svg"
                                          class="h-5 w-5 text-green-500"
                                          viewBox="0 0 20 20"
                                          fill="currentColor"
                                        >
                                          <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                          />
                                        </svg>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </button>
                              <!-- <button>
                                <div class="w-auto h-auto">
                                  <div class="flex-1 h-full">
                                    <div
                                      class="
                                        flex
                                        items-center
                                        justify-center
                                        flex-1
                                        h-full
                                        p-2
                                        border border-blue-800
                                        text-white
                                        shadow
                                        rounded-lg
                                        hover:bg-blue-50 hover:text-zinc-300
                                      "
                                    >
                                      <div class="relative">
                                        <svg
                                          xmlns="http://www.w3.org/2000/svg"
                                          class="h-5 w-5 text-blue-800"
                                          viewBox="0 0 20 20"
                                          fill="currentColor"
                                        >
                                          <path
                                            d="M17.453,12.691V7.723 M17.453,12.691V7.723 M1.719,12.691V7.723 M18.281,12.691V7.723 M12.691,12.484H7.309c-0.228,0-0.414,0.187-0.414,0.414s0.187,0.414,0.414,0.414h5.383c0.229,0,0.414-0.187,0.414-0.414S12.92,12.484,12.691,12.484M12.691,14.555H7.309c-0.228,0-0.414,0.187-0.414,0.414s0.187,0.414,0.414,0.414h5.383c0.229,0,0.414-0.187,0.414-0.414S12.92,14.555,12.691,14.555 M12.691,12.484H7.309c-0.228,0-0.414,0.187-0.414,0.414s0.187,0.414,0.414,0.414h5.383c0.229,0,0.414-0.187,0.414-0.414S12.92,12.484,12.691,12.484 M12.691,14.555H7.309c-0.228,0-0.414,0.187-0.414,0.414s0.187,0.414,0.414,0.414h5.383c0.229,0,0.414-0.187,0.414-0.414S12.92,14.555,12.691,14.555 M12.691,14.555H7.309c-0.228,0-0.414,0.187-0.414,0.414s0.187,0.414,0.414,0.414h5.383c0.229,0,0.414-0.187,0.414-0.414S12.92,14.555,12.691,14.555M12.691,12.484H7.309c-0.228,0-0.414,0.187-0.414,0.414s0.187,0.414,0.414,0.414h5.383c0.229,0,0.414-0.187,0.414-0.414S12.92,12.484,12.691,12.484 M7.309,13.312h5.383c0.229,0,0.414-0.187,0.414-0.414s-0.186-0.414-0.414-0.414H7.309c-0.228,0-0.414,0.187-0.414,0.414S7.081,13.312,7.309,13.312 M12.691,14.555H7.309c-0.228,0-0.414,0.187-0.414,0.414s0.187,0.414,0.414,0.414h5.383c0.229,0,0.414-0.187,0.414-0.414S12.92,14.555,12.691,14.555 M16.625,6.066h-1.449V3.168c0-0.228-0.186-0.414-0.414-0.414H5.238c-0.228,0-0.414,0.187-0.414,0.414v2.898H3.375c-0.913,0-1.656,0.743-1.656,1.656v4.969c0,0.913,0.743,1.656,1.656,1.656h1.449v2.484c0,0.228,0.187,0.414,0.414,0.414h9.523c0.229,0,0.414-0.187,0.414-0.414v-2.484h1.449c0.912,0,1.656-0.743,1.656-1.656V7.723C18.281,6.81,17.537,6.066,16.625,6.066 M5.652,3.582h8.695v2.484H5.652V3.582zM14.348,16.418H5.652v-4.969h8.695V16.418z M17.453,12.691c0,0.458-0.371,0.828-0.828,0.828h-1.449v-2.484c0-0.228-0.186-0.414-0.414-0.414H5.238c-0.228,0-0.414,0.186-0.414,0.414v2.484H3.375c-0.458,0-0.828-0.37-0.828-0.828V7.723c0-0.458,0.371-0.828,0.828-0.828h13.25c0.457,0,0.828,0.371,0.828,0.828V12.691z M7.309,13.312h5.383c0.229,0,0.414-0.187,0.414-0.414s-0.186-0.414-0.414-0.414H7.309c-0.228,0-0.414,0.187-0.414,0.414S7.081,13.312,7.309,13.312M7.309,15.383h5.383c0.229,0,0.414-0.187,0.414-0.414s-0.186-0.414-0.414-0.414H7.309c-0.228,0-0.414,0.187-0.414,0.414S7.081,15.383,7.309,15.383 M12.691,14.555H7.309c-0.228,0-0.414,0.187-0.414,0.414s0.187,0.414,0.414,0.414h5.383c0.229,0,0.414-0.187,0.414-0.414S12.92,14.555,12.691,14.555 M12.691,12.484H7.309c-0.228,0-0.414,0.187-0.414,0.414s0.187,0.414,0.414,0.414h5.383c0.229,0,0.414-0.187,0.414-0.414S12.92,12.484,12.691,12.484 M12.691,12.484H7.309c-0.228,0-0.414,0.187-0.414,0.414s0.187,0.414,0.414,0.414h5.383c0.229,0,0.414-0.187,0.414-0.414S12.92,12.484,12.691,12.484M12.691,14.555H7.309c-0.228,0-0.414,0.187-0.414,0.414s0.187,0.414,0.414,0.414h5.383c0.229,0,0.414-0.187,0.414-0.414S12.92,14.555,12.691,14.555"
                                          ></path>
                                        </svg>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </button> -->
                              <button
                                @click="
                                  confirmationEnterpriseDelete(enterprise)
                                "
                              >
                                <div class="w-auto h-auto">
                                  <div class="flex-1 h-full">
                                    <div
                                      class="
                                        flex
                                        items-center
                                        justify-center
                                        flex-1
                                        h-full
                                        p-2
                                        border border-red-500
                                        text-white
                                        shadow
                                        rounded-lg
                                        hover:bg-red-50 hover:text-zinc-300
                                      "
                                    >
                                      <div class="relative">
                                        <svg
                                          xmlns="http://www.w3.org/2000/svg"
                                          class="h-5 w-5 text-red-500"
                                          viewBox="0 0 20 20"
                                          fill="currentColor"
                                        >
                                          <path
                                            d="M17.114,3.923h-4.589V2.427c0-0.252-0.207-0.459-0.46-0.459H7.935c-0.252,0-0.459,0.207-0.459,0.459v1.496h-4.59c-0.252,0-0.459,0.205-0.459,0.459c0,0.252,0.207,0.459,0.459,0.459h1.51v12.732c0,0.252,0.207,0.459,0.459,0.459h10.29c0.254,0,0.459-0.207,0.459-0.459V4.841h1.511c0.252,0,0.459-0.207,0.459-0.459C17.573,4.127,17.366,3.923,17.114,3.923M8.394,2.886h3.214v0.918H8.394V2.886z M14.686,17.114H5.314V4.841h9.372V17.114z M12.525,7.306v7.344c0,0.252-0.207,0.459-0.46,0.459s-0.458-0.207-0.458-0.459V7.306c0-0.254,0.205-0.459,0.458-0.459S12.525,7.051,12.525,7.306M8.394,7.306v7.344c0,0.252-0.207,0.459-0.459,0.459s-0.459-0.207-0.459-0.459V7.306c0-0.254,0.207-0.459,0.459-0.459S8.394,7.051,8.394,7.306"
                                          ></path>
                                        </svg>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </button>
                              <div></div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <jet-dialog-modal
      :max-width="'input-sm'"
      :show="enterpriseBeingCreated"
      @close="enterpriseBeingCreated == null"
    >
      <template #title> Data New Enterprise</template>

      <template #content>
        <div class="flex flex-wrap">
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <div class="">
                <label class="block text-sm font-medium text-gray-700">
                  Name:
                </label>

                <small>Format: Name String.</small>
                <input
                  type="text"
                  minLength="10"
                  maxlength="100"
                  placeholder="Insert ur data here"
                  class="
                    border-0
                    px-3
                    placeholder-blueGray-300
                    text-blueGray-600
                    bg-white
                    rounded
                    text-sm
                    shadow
                    focus:outline-none focus:ring
                    w-full
                    ease-linear
                    transition-all
                    duration-150
                  "
                  v-model="form.Name"
                  required
                />
              </div>
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <div class="">
                <label class="block text-sm font-medium text-gray-700">
                  Address:
                </label>

                <small>Address: Address String.</small>
                <input
                  type="text"
                  minLength="10"
                  maxlength="100"
                  placeholder="Insert ur data here"
                  class="
                    border-0
                    px-3
                    placeholder-blueGray-300
                    text-blueGray-600
                    bg-white
                    rounded
                    text-sm
                    shadow
                    focus:outline-none focus:ring
                    w-full
                    ease-linear
                    transition-all
                    duration-150
                  "
                  v-model="form.Address"
                  required
                />
              </div>
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <div class="">
                <label class="block text-sm font-medium text-gray-700">
                  Phone:
                </label>

                <small>Format: Phone Number.</small>
                <input
                  type="text"
                  minLength="10"
                  maxlength="100"
                  placeholder="Insert ur data here"
                  class="
                    border-0
                    px-3
                    placeholder-blueGray-300
                    text-blueGray-600
                    bg-white
                    rounded
                    text-sm
                    shadow
                    focus:outline-none focus:ring
                    w-full
                    ease-linear
                    transition-all
                    duration-150
                  "
                  v-model="form.Phone"
                  required
                />
              </div>
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <div class="">
                <label class="block text-sm font-medium text-gray-700">
                  Status:
                </label>

                <small>Format: YES OR NO.</small>

                <select
                  v-model="form.Status"
                  class="
                    mt-1
                    block
                    w-full
                    py-2
                    px-3
                    border border-gray-300
                    bg-white
                    rounded-md
                    shadow-sm
                    focus:outline-none focus:ring-blue-500 focus:border-blue-500
                    sm:text-sm
                  "
                >
                  <option value="1">Active</option>
                  <option value="0">Disable</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </template>

      <template #footer>
        <jet-secondary-button @click="createEnterpriseCancel">
          Cancel
        </jet-secondary-button>

        <jet-button-success class="ml-3" @click="createEnterprise">
          Create
        </jet-button-success>
      </template>
    </jet-dialog-modal>

    <jet-dialog-modal
      :max-width="'input-sm'"
      :show="enterpriseBeingUpdated"
      @close="enterpriseBeingUpdated == null"
    >
      <template #title> Data Update Enterprise</template>

      <template #content>
        <div class="flex flex-wrap">
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <div class="">
                <label class="block text-sm font-medium text-gray-700">
                  Name:
                </label>

                <small>Format: Name String.</small>
                <input
                  type="text"
                  minLength="10"
                  maxlength="100"
                  placeholder="Insert ur data here"
                  class="
                    border-0
                    px-3
                    placeholder-blueGray-300
                    text-blueGray-600
                    bg-white
                    rounded
                    text-sm
                    shadow
                    focus:outline-none focus:ring
                    w-full
                    ease-linear
                    transition-all
                    duration-150
                  "
                  v-model="updateEnterpriseForm.Name"
                  required
                />
              </div>
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <div class="">
                <label class="block text-sm font-medium text-gray-700">
                  Address:
                </label>

                <small>Address: Address String.</small>
                <input
                  type="text"
                  minLength="10"
                  maxlength="100"
                  placeholder="Insert ur data here"
                  class="
                    border-0
                    px-3
                    placeholder-blueGray-300
                    text-blueGray-600
                    bg-white
                    rounded
                    text-sm
                    shadow
                    focus:outline-none focus:ring
                    w-full
                    ease-linear
                    transition-all
                    duration-150
                  "
                  v-model="updateEnterpriseForm.Address"
                  required
                />
              </div>
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <div class="">
                <label class="block text-sm font-medium text-gray-700">
                  Phone:
                </label>

                <small>Format: Phone Number.</small>
                <input
                  type="text"
                  minLength="10"
                  maxlength="100"
                  placeholder="Insert ur data here"
                  class="
                    border-0
                    px-3
                    placeholder-blueGray-300
                    text-blueGray-600
                    bg-white
                    rounded
                    text-sm
                    shadow
                    focus:outline-none focus:ring
                    w-full
                    ease-linear
                    transition-all
                    duration-150
                  "
                  v-model="updateEnterpriseForm.Phone"
                  required
                />
              </div>
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <div class="">
                <label class="block text-sm font-medium text-gray-700">
                  Status:
                </label>

                <small>Format: YES OR NO.</small>

                <select
                  v-model="updateEnterpriseForm.Status"
                  class="
                    mt-1
                    block
                    w-full
                    py-2
                    px-3
                    border border-gray-300
                    bg-white
                    rounded-md
                    shadow-sm
                    focus:outline-none focus:ring-blue-500 focus:border-blue-500
                    sm:text-sm
                  "
                >
                  <option value="1">Active</option>
                  <option value="0">Disable</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </template>

      <template #footer>
        <jet-secondary-button @click="updateEnterpriseCancel">
          Cancel
        </jet-secondary-button>

        <jet-button-success class="ml-3" @click="updateEnterprise">
          Update
        </jet-button-success>
      </template>
    </jet-dialog-modal>

    <jet-confirmation-modal
      :show="enterpriseBeingDeleted"
      @close="enterpriseBeingDeleted == null"
    >
      <template #title> Delete Enterprise</template>

      <template #content>
        ¿Are u sure to delete the data?
        <p>
          {{ this.deleteEnterpriseForm.Name }} -
          {{ this.deleteEnterpriseForm.Address }} -
          {{ this.deleteEnterpriseForm.Phone }}
        </p>
      </template>

      <template #footer>
        <jet-secondary-button @click="enterpriseBeingDeleted = null">
          Cancel
        </jet-secondary-button>

        <jet-danger-button class="ml-3" @click="deleteEnterprise">
          Delete
        </jet-danger-button>
      </template>
    </jet-confirmation-modal>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";

import JetActionSection from "@/Jetstream/ActionSection.vue";
import JetDialogModal from "@/Jetstream/DialogModal.vue";
import JetConfirmationModal from "@/Jetstream/ConfirmationModal.vue";
import JetDangerButton from "@/Jetstream/DangerButton.vue";
import JetSecondaryButton from "@/Jetstream/SecondaryButton.vue";
import JetButtonSuccess from "@/Jetstream/ButtonSuccess";
import axios from "axios";
import url from "../../environmentData";

export default defineComponent({
  props: ["user", "customer", "dateref"],

  created() {
    this.getEnterprises();
  },

  components: {
    AppLayout,
    Link,
    JetActionSection,
    JetConfirmationModal,
    JetDangerButton,
    JetDialogModal,
    JetSecondaryButton,
    JetButtonSuccess,
  },
  data() {
    return {
      apiConsume: url,
      confirmingTeamDeletion: false,
      deleting: false,
      listEnterprises: [],
      enterpriseBeingCreated: null,
      form: this.$inertia.form({
        Status: null,
        Address: null,
        Name: null,
        Phone: null,
        CreatedBy: null,
        CreatedDate: null,
        ModifiedBy: null,
        ModifiedDate: null,
      }),
      enterpriseBeingUpdated: null,
      updateEnterpriseForm: this.$inertia.form({
        Status: null,
        Address: null,
        Name: null,
        Phone: null,
        CreatedBy: null,
        CreatedDate: null,
        ModifiedBy: null,
        ModifiedDate: null,
      }),
      enterpriseBeingDeleted: null,
      deleteEnterpriseForm: this.$inertia.form({
        Status: null,
        Address: null,
        Name: null,
        Phone: null,
      }),
    };
  },

  methods: {
    getEnterprises() {
      axios.get(`${this.apiConsume.url}/Enterprises`).then((response) => {
        this.listEnterprises = response.data;
      });
    },

    confirmationCreateEnterprise() {
      this.enterpriseBeingCreated = this.form;
    },

    createEnterpriseCancel() {
      this.enterpriseBeingCreated = null;
      this.form.reset();
    },

    createEnterprise() {
      let dataLocal = {
        CreatedBy: this.user.name,
        CreatedDate: this.dateref,
        ModifiedBy: this.user.name,
        ModifiedDate: this.dateref,
        Status: parseInt(this.enterpriseBeingCreated.Status),
        Address: this.enterpriseBeingCreated.Address,
        Name: this.enterpriseBeingCreated.Name,
        Phone: this.enterpriseBeingCreated.Phone,
      };

      axios.post(`${this.apiConsume.url}/Enterprises`, { ...dataLocal }).then(
        (response) => {
          this.enterpriseBeingCreated = null;
          this.form.reset();
          this.getEnterprises();

          this.$swal.fire({
            toast: true,
            position: "top-end",
            icon: "success",
            title: "Your enterprise has been saved",
            showConfirmButton: false,
            timer: 1500,
          });

          console.log(response);
        },
        (error) => {
          this.$swal.fire({
            toast: true,
            position: "top-end",
            icon: "error",
            title: "Something went wrong",
            showConfirmButton: false,
            timer: 1500,
          });
          console.log(error);
        }
      );
    },

    confirmationEnterpriseUpdate(enterprise) {
      this.updateEnterpriseForm.Status = enterprise.status;
      this.updateEnterpriseForm.Address = enterprise.address;
      this.updateEnterpriseForm.Name = enterprise.name;
      this.updateEnterpriseForm.Phone = enterprise.phone;
      this.updateEnterpriseForm.CreatedBy = enterprise.createdBy;
      this.updateEnterpriseForm.CreatedDate = enterprise.createdDate;
      this.updateEnterpriseForm.ModifiedBy = this.user.name;
      this.updateEnterpriseForm.ModifiedDate = this.dateref;

      this.enterpriseBeingUpdated = enterprise;
    },

    updateEnterpriseCancel() {
      this.enterpriseBeingUpdated = null;
      this.updateEnterpriseForm.reset();
    },

    updateEnterprise() {
      let dataLocal = {
        Id: this.enterpriseBeingUpdated.id,
        CreatedBy: this.updateEnterpriseForm.CreatedBy,
        CreatedDate: this.updateEnterpriseForm.CreatedDate,
        ModifiedBy: this.updateEnterpriseForm.ModifiedBy,
        ModifiedDate: this.updateEnterpriseForm.ModifiedDate,
        Status: parseInt(this.updateEnterpriseForm.Status),
        Address: this.updateEnterpriseForm.Address,
        Name: this.updateEnterpriseForm.Name,
        Phone: this.updateEnterpriseForm.Phone,
      };
      axios
        .put(`${this.apiConsume.url}/Enterprises/${dataLocal.Id}`, {
          ...dataLocal,
        })
        .then(
          (response) => {
            this.enterpriseBeingUpdated = null;
            this.updateEnterpriseForm.reset();
            this.getEnterprises();
            console.log(response);

            this.$swal.fire({
              toast: true,
              position: "top-end",
              icon: "success",
              title: "Your enterprise has been updated",
              showConfirmButton: false,
              timer: 1500,
            });
          },
          (error) => {
            this.$swal.fire({
              toast: true,
              position: "top-end",
              icon: "error",
              title: "Something went wrong",
              showConfirmButton: false,
              timer: 1500,
            });

            console.log(error);
          }
        );
    },

    confirmationEnterpriseDelete(enterprise) {
      this.deleteEnterpriseForm.Status = enterprise.status;
      this.deleteEnterpriseForm.Address = enterprise.address;
      this.deleteEnterpriseForm.Name = enterprise.name;
      this.deleteEnterpriseForm.Phone = enterprise.phone;

      this.enterpriseBeingDeleted = enterprise;
    },

    deleteEnterprise() {
      axios
        .delete(
          `${this.apiConsume.url}/Enterprises/${this.enterpriseBeingDeleted.id}`
        )
        .then(
          (response) => {
            this.enterpriseBeingDeleted = null;
            this.deleteEnterpriseForm.reset();
            this.getEnterprises();

            this.$swal.fire({
              toast: true,
              position: "top-end",
              icon: "success",
              title: "Your enterprise has been deleted",
              showConfirmButton: false,
              timer: 1500,
            });

            console.log(response);
          },
          (error) => {
            this.$swal.fire({
              toast: true,
              position: "top-end",
              icon: "error",
              title: "Something went wrong",
              showConfirmButton: false,
              timer: 1500,
            });

            console.log(error);
          }
        );
    },

    showAlert() {
      // Use sweetalert2
      this.$swal.fire({
        position: "top-end",
        icon: "success",
        title: "Your work has been saved",
        showConfirmButton: false,
        timer: 1500,
      });
    },
  },
});
</script>
