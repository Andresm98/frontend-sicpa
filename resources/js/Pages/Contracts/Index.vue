<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Contracts
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
      <jet-secondary-button type="submit" @click="confirmationCreateDepartment"
        >Create Contract</jet-secondary-button
      >
      <br />
      <br />
    </div>
    <section class="py-1 bg-gray">
      <div class="w-full lg:w-full">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6">
          <div class="overflow-hidden">
            <small class="ml-6">
              {{ listDepartmentsEmployees.length }} records found.</small
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
                      <thead class="bg-red-100">
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
                              >Contract
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
                          v-for="department in listDepartmentsEmployees"
                          :key="department.id"
                        >
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="flex-shrink-0 h-10 w-10">
                                <img
                                  class="h-10 w-10 rounded-full"
                                  src="https://www.pngitem.com/pimgs/m/21-217455_contract-png-file-letter-of-acceptance-icon-transparent.png"
                                  alt=""
                                />
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                              <div class="text-sm text-gray-500">
                                {{ department.createdBy }}
                              </div>
                              <br />

                              <div class="text-sm text-gray-500">
                                {{ department.createdDate }}
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                              <div class="text-sm text-gray-500">
                                {{ department.modifiedBy }}
                              </div>
                              <br />

                              <div class="text-sm text-gray-500">
                                {{ department.modifiedDate }}
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div>
                              <div v-if="department.status == 1">
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
                              <div v-if="department.status == 0">
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
                                  confirmationDepartmentUpdate(department)
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
                              <button
                                @click="
                                  confirmationDepartmentDelete(department)
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
      :show="departmentBeingCreated"
      @close="departmentBeingCreated == null"
    >
      <template #title> Data New Contract</template>

      <template #content>
        <div class="flex flex-wrap">
          <div class="w-full lg:w-12/12 px-4">
            <div class="relative w-full mb-3">
              <div class="">
                <label class="block text-sm font-medium text-gray-700">
                  Department:
                </label>
                <small>Format: Select.</small>
                <div :class="{ invalid: isInvalidEnterprise }">
                  <div v-if="this.listDepartments != null">
                    <multiselect
                      :searchable="true"
                      placeholder="Select the Enterprise"
                      select-label="Select me please!"
                      v-model="this.selectOne.selectedEnterprise"
                      :options="this.listDepartments"
                      :close-on-select="true"
                      :clear-on-select="false"
                      :max-height="200"
                      mode="tags"
                      label="name"
                    ></multiselect>
                    <p
                      class="text-sm text-red-400"
                      v-show="isInvalidEnterprise"
                    >
                      Obligatorio
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="w-full lg:w-12/12 px-4">
            <div class="relative w-full mb-3">
              <div class="">
                <label class="block text-sm font-medium text-gray-700">
                  Employee:
                </label>
                <small>Format: Select.</small>
                <div :class="{ invalid: isInvalidEmployee }">
                  <div v-if="this.listEmployees != null">
                    <multiselect
                      :searchable="true"
                      placeholder="Select the Enterprise"
                      select-label="Select me please!"
                      v-model="this.selectTwo.selectedEnterprise"
                      :options="this.listEmployees"
                      :close-on-select="true"
                      :clear-on-select="false"
                      :max-height="200"
                      mode="tags"
                      label="name"
                    ></multiselect>
                    <p
                      class="text-sm text-red-400"
                      v-show="isInvalidEmployee"
                    >
                      Obligatorio
                    </p>
                  </div>
                </div>
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
        <jet-secondary-button @click="createDepartmentCancel">
          Cancel
        </jet-secondary-button>

        <jet-button-success class="ml-3" @click="createDepartment">
          Create
        </jet-button-success>
      </template>
    </jet-dialog-modal>

    <jet-dialog-modal
      :max-width="'input-sm'"
      :show="departmentBeingUpdated"
      @close="departmentBeingUpdated == null"
    >
      <template #title> Data Update Contract</template>

      <template #content>
        <div class="flex flex-wrap">
          <div class="w-full lg:w-12/12 px-4">
            <div class="relative w-full mb-3">
              <div class="">
                <label class="block text-sm font-medium text-gray-700">
                  Department:
                </label>
                <small>Format: Select.</small>
                <div :class="{ invalid: isInvalidEnterprise }">
                  <div v-if="this.listDepartments != null">
                    <multiselect
                      :searchable="true"
                      placeholder="Select the Enterprise"
                      select-label="Select me please!"
                      v-model="this.selectOne.selectedEnterprise"
                      :options="this.listDepartments"
                      :close-on-select="true"
                      :clear-on-select="false"
                      :max-height="200"
                      mode="tags"
                      label="name"
                    ></multiselect>
                    <p
                      class="text-sm text-red-400"
                      v-show="isInvalidEnterprise"
                    >
                      Obligatorio
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="w-full lg:w-12/12 px-4">
            <div class="relative w-full mb-3">
              <div class="">
                <label class="block text-sm font-medium text-gray-700">
                  Employee:
                </label>
                <small>Format: Select.</small>
                <div :class="{ invalid: isInvalidEmployee }">
                  <div v-if="this.listEmployees != null">
                    <multiselect
                      :searchable="true"
                      placeholder="Select the Enterprise"
                      select-label="Select me please!"
                      v-model="this.selectTwo.selectedEnterprise"
                      :options="this.listEmployees"
                      :close-on-select="true"
                      :clear-on-select="false"
                      :max-height="200"
                      mode="tags"
                      label="name"
                    ></multiselect>
                    <p
                      class="text-sm text-red-400"
                      v-show="isInvalidEmployee"
                    >
                      Obligatorio
                    </p>
                  </div>
                </div>
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
                  v-model="updateDepartmentForm.Status"
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
        <jet-secondary-button @click="updateDepartmentCancel">
          Cancel
        </jet-secondary-button>

        <jet-button-success class="ml-3" @click="updateDepartment">
          Update
        </jet-button-success>
      </template>
    </jet-dialog-modal>

    <jet-confirmation-modal
      :show="departmentBeingDeleted"
      @close="departmentBeingDeleted == null"
    >
      <template #title> Delete Contract</template>

      <template #content>
        ¿Are u sure to delete the data?
      </template>

      <template #footer>
        <jet-secondary-button @click="departmentBeingDeleted = null">
          Cancel
        </jet-secondary-button>

        <jet-danger-button class="ml-3" @click="deleteDepartment">
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
import Multiselect from "vue-multiselect";
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
    this.getDepartments();
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
    Multiselect,
  },
  data() {
    return {
      selected: null,
      options: ["list", "of", "options"],
      apiConsume: url,
      confirmingTeamDeletion: false,
      deleting: false,
      listDepartmentsEmployees: [],
      listDepartments: [],
      listEmployees: [],
      departmentBeingCreated: null,
      form: this.$inertia.form({
        Status: null,
        Description: null,
        Name: null,
        Phone: null,
        CreatedBy: null,
        CreatedDate: null,
        ModifiedBy: null,
        ModifiedDate: null,
      }),
      selectOne: {
        selectedEnterprise: undefined,
        value: 0,
        isDisabled: false,
        isTouched: false,
        options: {
          type: Array,
          default: () => [],
        },
        loading: false,
        multiSelectEmployee: null,
        vSelectEmployee: null,
      },
      selectTwo: {
        selectedEnterprise: undefined,
        value: 0,
        isDisabled: false,
        isTouched: false,
        options: {
          type: Array,
          default: () => [],
        },
        loading: false,
        multiSelectEnterprise: null,
        vSelectEnterprise: null,
      },
      departmentBeingUpdated: null,
      updateDepartmentForm: this.$inertia.form({
        Status: null,
        CreatedBy: null,
        CreatedDate: null,
        ModifiedBy: null,
        ModifiedDate: null,
        DepartmentsId: null,
        EmployeesId: null,
      }),
      departmentBeingDeleted: null,
      deleteDepartmentForm: this.$inertia.form({
        Status: null,
      }),
    };
  },
  computed: {
    isInvalidEnterprise() {
      return (
        this.selectOne.selectedEnterprise == undefined ||
        this.selectOne.selectedEnterprise == null
      );
    },
    isInvalidEmployee() {
      return (
        this.selectTwo.selectedEnterprise == undefined ||
        this.selectTwo.selectedEnterprise == null
      );
    },
  },
  methods: {
    getDepartments() {
      axios
        .get(`${this.apiConsume.url}/DepartmentEmployee`)
        .then((response) => {
          this.listDepartmentsEmployees = response.data;
        });

      axios.get(`${this.apiConsume.url}/Departaments`).then((response) => {
        this.listDepartments = response.data;
      });

      axios.get(`${this.apiConsume.url}/Employees`).then((response) => {
        this.listEmployees = response.data;
      });
    },

    confirmationCreateDepartment() {
      this.departmentBeingCreated = this.form;
    },

    createDepartmentCancel() {
      this.departmentBeingCreated = null;
      this.selectOne.selectedEnterprise = null;
      this.selectTwo.selectedEnterprise = null;
      this.form.reset();
    },

    createDepartment() {
      if (this.isInvalidEnterprise == false) {
        let dataLocal = {
          CreatedBy: this.user.name,
          CreatedDate: this.dateref,
          ModifiedBy: this.user.name,
          ModifiedDate: this.dateref,
          Status: parseInt(this.departmentBeingCreated.Status),
        };

        if (
          this.selectOne.selectedEnterprise != null ||
          this.selectTwo.selectedEnterprise != null
        ) {
          let enterpriseId = this.selectOne.selectedEnterprise.id;
          let employeeId = this.selectTwo.selectedEnterprise.id;

          axios
            .post(
              `${this.apiConsume.url}/DepartmentEmployee?departmentId=${enterpriseId}&employeeId=${employeeId}`,
              {
                ...dataLocal,
              }
            )
            .then(
              (response) => {
                this.departmentBeingCreated = null;
                this.form.reset();
                this.selectOne.selectedEnterprise = null;
                this.selectTwo.selectedEnterprise = null;
                this.getDepartments();

                this.$swal.fire({
                  toast: true,
                  position: "top-end",
                  icon: "success",
                  title: "Your contract has been saved",
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
        }
      }
    },

    confirmationDepartmentUpdate(department) {
      this.updateDepartmentForm.Status = department.status;
      this.updateDepartmentForm.CreatedBy = department.createdBy;
      this.updateDepartmentForm.CreatedDate = department.createdDate;
      this.updateDepartmentForm.ModifiedBy = this.user.name;
      this.updateDepartmentForm.ModifiedDate = this.dateref;
      this.updateDepartmentForm.enterprisesId = department.enterprisesId;

      this.status(department).then((response) => {
        this.selectOne.selectedEnterprise = response;
      });

      this.statusTwo(department).then((response) => {
        this.selectTwo.selectedEnterprise = response;
      });

      this.departmentBeingUpdated = department;
    },
    async status(department) {
      let response = await axios.get(
        `${this.apiConsume.url}/Departaments/${department.departmentsId}`
      );

      return response.data;
    },
    async statusTwo(department) {
      let response = await axios.get(
        `${this.apiConsume.url}/Employees/${department.employeesId}`
      );

      return response.data;
    },

    updateDepartmentCancel() {
      this.departmentBeingUpdated = null;
      this.selectOne.selectedEnterprise = null;
      this.selectTwo.selectedEnterprise = null;
      this.updateDepartmentForm.reset();
    },

    updateDepartment() {
      let dataLocal = {
        Id: this.departmentBeingUpdated.id,
        CreatedBy: this.updateDepartmentForm.CreatedBy,
        CreatedDate: this.updateDepartmentForm.CreatedDate,
        ModifiedBy: this.updateDepartmentForm.ModifiedBy,
        ModifiedDate: this.updateDepartmentForm.ModifiedDate,
        Status: parseInt(this.updateDepartmentForm.Status),
        departmentsId: this.selectOne.selectedEnterprise.id,
        employeesId: this.selectTwo.selectedEnterprise.id,
      };
      axios
        .put(`${this.apiConsume.url}/DepartmentEmployee/${dataLocal.Id}?departmentId=${dataLocal.departmentsId}&employeeId=${dataLocal.employeesId}`, {
          ...dataLocal,
        })
        .then(
          (response) => {
            this.departmentBeingUpdated = null;
            this.getDepartments();
            this.updateDepartmentForm.reset();
            this.selectOne.selectedEnterprise = null;
            this.selectTwo.selectedEnterprise = null;
            console.log(response);

            this.$swal.fire({
              toast: true,
              position: "top-end",
              icon: "success",
              title: "Your department has been updated",
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

    confirmationDepartmentDelete(department) {
      this.deleteDepartmentForm.Status = department.status;

      this.departmentBeingDeleted = department;
    },

    deleteDepartment() {
      axios
        .delete(
          `${this.apiConsume.url}/DepartmentEmployee/${this.departmentBeingDeleted.id}`
        )
        .then(
          (response) => {
            this.departmentBeingDeleted = null;
            this.deleteDepartmentForm.reset();
            this.getDepartments();

            this.$swal.fire({
              toast: true,
              position: "top-end",
              icon: "success",
              title: "Your contract has been deleted",
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
