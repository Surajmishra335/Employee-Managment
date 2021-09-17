<template>
    <div>
        <h2 class="mb-2 text-center">Employees</h2>
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        <div class="alert alert-success" v-if="showMessage">
                            {{ message }}
                        </div>

                        <div class="row">
                            <div class="col">
                                <form>
                                    <div class="form-row align-items-center">
                                        <div class=" form-group col">
                                            <input
                                                type="search"
                                                v-model.lazy="search"
                                                class="form-control mb-2"
                                            />
                                        </div>
                                        <div class="col form-group">
                                            <button
                                                class="btn btn-primary mb-2 btn-sm"
                                                
                                            >
                                                Search
                                            </button>
                                        </div>
                                        <div class="form-group col">
                                            <select
                                                class="custom-select"
                                                id="department_id"
                                                name="department_id"
                                                v-model="selectedDepartment"
                                            >
                                                <option
                                                    v-for="department in departments"
                                                    :key="department.id"
                                                    :value="department.id"
                                                    >{{
                                                        department.name
                                                    }}</option
                                                >
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col">
                                <router-link
                                    :to="{ name: 'EmployeesCreate' }"
                                    class="float-right btn btn-primary btn-sm"
                                    >Create</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="employee in employees"
                                    :key="employee.id"
                                >
                                    <td scope="col">{{ employee.id }}</td>
                                    <td scope="col">
                                        {{ employee.first_name }}
                                    </td>
                                    <td scope="col">
                                        {{ employee.last_name }}
                                    </td>
                                    <td scope="col">{{ employee.address }}</td>
                                    <td scope="col">
                                        {{ employee.department_id }}
                                    </td>
                                    <td>
                                        <router-link
                                            :to="{
                                                name: 'EmployeesEdit',
                                                params: { id: employee.id }
                                            }"
                                            class="btn btn-primary btn-sm"
                                            >Edit</router-link
                                        >
                                        <button
                                            class="btn btn-danger btn-sm"
                                            @click.prevent="
                                                deleteEmployee(employee.id)
                                            "
                                        >
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            employees: [],
            showMessage: false,
            message: [],
            search: null,
            selectedDepartment: null,
            departments: []
        };
    },
    watch: {
        search(){
            this.getEmployees();
        },
        selectedDepartment(){
            this.getEmployees();
        }
    },
    created() {
        this.getEmployees();
        this.getDepartments();
    },
    methods: {
        getEmployees() {
            axios
                .get("/api/employees", {
                    params: {
                        search: this.search,
                        department_id: this.selectedDepartment
                    }
                })
                .then(res => {
                    this.employees = res.data.data;
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
        deleteEmployee(id) {
            axios.delete("api/employees/" + id).then(res => {
                this.showMessage = true;
                this.message = res.data;
                this.getEmployees();
            });
        },
        getDepartments() {
            axios
                .get("/api/employees/departments")
                .then(res => {
                    this.departments = res.data;
                })
                .catch(error => {
                    console.log(console.error);
                });
        }
    }
};
</script>

<style></style>
