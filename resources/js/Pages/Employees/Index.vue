<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Employees
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
      <jet-secondary-button type="submit" @click="confirmationCreateEmployee"
        >Create Employee</jet-secondary-button
      >
      <br />
      <br />
    </div>
    <section class="py-1 bg-gray">
      <div class="w-full lg:w-full">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6">
          <div class="overflow-hidden">
            <small class="ml-6">
              {{ listEmployees.length }} records found.</small
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
                      <thead class="bg-yellow-100">
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
                              >Age/Name/Position/Surname
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
                          v-for="employee in listEmployees"
                          :key="employee.id"
                        >
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="flex-shrink-0 h-10 w-10">
                                <img
                                  class="h-10 w-10 rounded-full"
                                  src="https://icons.veryicon.com/png/o/miscellaneous/two-color-icon-library/user-286.png"
                                  alt=""
                                />
                              </div>
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                  Age: {{ employee.age }}
                                </div>
                                <div class="text-sm text-gray-500">
                                  Name: {{ employee.name }}
                                </div>
                                <div class="text-sm text-gray-500">
                                  Position: {{ employee.position }}
                                </div>
                                <div class="text-sm text-gray-500">
                                  Surname: {{ employee.surname }}
                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                              <div class="text-sm text-gray-500">
                                {{ employee.createdBy }}
                              </div>
                              <br />

                              <div class="text-sm text-gray-500">
                                {{ employee.createdDate }}
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                              <div class="text-sm text-gray-500">
                                {{ employee.modifiedBy }}
                              </div>
                              <br />

                              <div class="text-sm text-gray-500">
                                {{ employee.modifiedDate }}
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div>
                              <div v-if="employee.status == 1">
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
                              <div v-if="employee.status == 0">
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
                                @click="confirmationEmployeeUpdate(employee)"
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
                              <button
                                @click="confirmationEmployeeDelete(employee)"
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
      :show="employeeBeingCreated"
      @close="employeeBeingCreated == null"
    >
      <template #title> Data New Employee</template>

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
                  Surname:
                </label>

                <small>Format: Surname String.</small>
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
                  v-model="form.Surname"
                  required
                />
              </div>
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <div class="">
                <label class="block text-sm font-medium text-gray-700">
                  Age:
                </label>

                <small>Age: Age Number.</small>
                <input
                  type="number"
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
                  v-model="form.Age"
                  required
                />
              </div>
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <div class="">
                <label class="block text-sm font-medium text-gray-700">
                  Position:
                </label>

                <small>Format: Position String.</small>
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
                  v-model="form.Position"
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
        <jet-secondary-button @click="createEmployeeCancel">
          Cancel
        </jet-secondary-button>

        <jet-button-success class="ml-3" @click="createEmployee">
          Create
        </jet-button-success>
      </template>
    </jet-dialog-modal>

    <jet-dialog-modal
      :max-width="'input-sm'"
      :show="employeeBeingUpdated"
      @close="employeeBeingUpdated == null"
    >
      <template #title> Data Update Employee</template>

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
                  v-model="updateEmployeeForm.Name"
                  required
                />
              </div>
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <div class="">
                <label class="block text-sm font-medium text-gray-700">
                  Surname:
                </label>

                <small>Format: Surname String.</small>
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
                  v-model="updateEmployeeForm.Surname"
                  required
                />
              </div>
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <div class="">
                <label class="block text-sm font-medium text-gray-700">
                  Age:
                </label>

                <small>Age: Age Number.</small>
                <input
                  type="number"
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
                  v-model="updateEmployeeForm.Age"
                  required
                />
              </div>
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <div class="">
                <label class="block text-sm font-medium text-gray-700">
                  Position:
                </label>

                <small>Format: Position String.</small>
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
                  v-model="updateEmployeeForm.Position"
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
                  v-model="updateEmployeeForm.Status"
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
        <jet-secondary-button @click="updateEmployeeCancel">
          Cancel
        </jet-secondary-button>

        <jet-button-success class="ml-3" @click="updateEmployee">
          Update
        </jet-button-success>
      </template>
    </jet-dialog-modal>

    <jet-confirmation-modal
      :show="employeeBeingDeleted"
      @close="employeeBeingDeleted == null"
    >
      <template #title> Delete Employee</template>

      <template #content>
        ¿Are u sure to delete the data?
        <p>
          {{ this.deleteEmployeeForm.Name }} -
          {{ this.deleteEmployeeForm.Age }} -
          {{ this.deleteEmployeeForm.Position }}
        </p>
      </template>

      <template #footer>
        <jet-secondary-button @click="employeeBeingDeleted = null">
          Cancel
        </jet-secondary-button>

        <jet-danger-button class="ml-3" @click="deleteEmployee">
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
    this.getEmployees();
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
      listEmployees: [],
      employeeBeingCreated: null,
      form: this.$inertia.form({
        Status: null,
        Age: null,
        Name: null,
        Surname:null,
        Position: null,
        CreatedBy: null,
        CreatedDate: null,
        ModifiedBy: null,
        ModifiedDate: null,
      }),
      employeeBeingUpdated: null,
      updateEmployeeForm: this.$inertia.form({
        Status: null,
        Age: null,
        Name: null,
        Surname: null,
        Position: null,
        CreatedBy: null,
        CreatedDate: null,
        ModifiedBy: null,
        ModifiedDate: null,
      }),
      employeeBeingDeleted: null,
      deleteEmployeeForm: this.$inertia.form({
        Status: null,
        Age: null,
        Name: null,
        Position: null,
      }),
    };
  },

  methods: {
    getEmployees() {
      axios.get(`${this.apiConsume.url}/Employees`).then((response) => {
        this.listEmployees = response.data;
      });
    },

    confirmationCreateEmployee() {
      this.employeeBeingCreated = this.form;
    },

    createEmployeeCancel() {
      this.employeeBeingCreated = null;
      this.form.reset();
    },

    createEmployee() {
      let dataLocal = {
        CreatedBy: this.user.name,
        CreatedDate: this.dateref,
        ModifiedBy: this.user.name,
        ModifiedDate: this.dateref,
        Status: parseInt(this.employeeBeingCreated.Status),
        Age: this.employeeBeingCreated.Age,
        Name: this.employeeBeingCreated.Name,
        Surname: this.employeeBeingCreated.Surname,
        Position: this.employeeBeingCreated.Position,
      };

      axios.post(`${this.apiConsume.url}/Employees`, { ...dataLocal }).then(
        (response) => {
          this.employeeBeingCreated = null;
          this.form.reset();
          this.getEmployees();

          this.$swal.fire({
            toast: true,
            position: "top-end",
            icon: "success",
            title: "Your employee has been saved",
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

    confirmationEmployeeUpdate(employee) {
      this.updateEmployeeForm.Status = employee.status;
      this.updateEmployeeForm.Age = employee.age;
      this.updateEmployeeForm.Name = employee.name;
      this.updateEmployeeForm.Surname = employee.surname;
      this.updateEmployeeForm.Position = employee.position;
      this.updateEmployeeForm.CreatedBy = employee.createdBy;
      this.updateEmployeeForm.CreatedDate = employee.createdDate;
      this.updateEmployeeForm.ModifiedBy = this.user.name;
      this.updateEmployeeForm.ModifiedDate = this.dateref;

      this.employeeBeingUpdated = employee;
    },

    updateEmployeeCancel() {
      this.employeeBeingUpdated = null;
      this.updateEmployeeForm.reset();
    },

    updateEmployee() {
      let dataLocal = {
        Id: this.employeeBeingUpdated.id,
        CreatedBy: this.updateEmployeeForm.CreatedBy,
        CreatedDate: this.updateEmployeeForm.CreatedDate,
        ModifiedBy: this.updateEmployeeForm.ModifiedBy,
        ModifiedDate: this.updateEmployeeForm.ModifiedDate,
        Status: parseInt(this.updateEmployeeForm.Status),
        Age: this.updateEmployeeForm.Age,
        Name: this.updateEmployeeForm.Name,
        Surname: this.updateEmployeeForm.Surname,
        Position: this.updateEmployeeForm.Position,
      };
      axios
        .put(`${this.apiConsume.url}/Employees/${dataLocal.Id}`, {
          ...dataLocal,
        })
        .then(
          (response) => {
            this.employeeBeingUpdated = null;
            this.updateEmployeeForm.reset();
            this.getEmployees();
            console.log(response);

            this.$swal.fire({
              toast: true,
              position: "top-end",
              icon: "success",
              title: "Your employee has been updated",
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

    confirmationEmployeeDelete(employee) {
      this.deleteEmployeeForm.Status = employee.status;
      this.deleteEmployeeForm.Age = employee.age;
      this.deleteEmployeeForm.Name = employee.name;
      this.deleteEmployeeForm.Position = employee.position;

      this.employeeBeingDeleted = employee;
    },

    deleteEmployee() {
      axios
        .delete(
          `${this.apiConsume.url}/Employees/${this.employeeBeingDeleted.id}`
        )
        .then(
          (response) => {
            this.employeeBeingDeleted = null;
            this.deleteEmployeeForm.reset();
            this.getEmployees();

            this.$swal.fire({
              toast: true,
              position: "top-end",
              icon: "success",
              title: "Your employee has been deleted",
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
