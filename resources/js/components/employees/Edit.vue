<template>
    <div>
        <h2 class="mb-2 text-center">Update</h2>
        <div class="row justify-content-center">
            <div class="col-md-6 offset-1">
                <div class="card">
                    <div class="card-header">
                        Update Employee
                        <router-link
                            :to="{ name: 'EmployeesIndex' }"
                            class="btn btn-primary float-right btn-sm"
                            >Back</router-link
                        >
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="updateEmployee">
                            <div class="form-group">
                                <label for="first name">First Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="first_name"
                                    placeholder="first name"
                                    v-model="form.first_name"
                                />
                            </div>
                            <div class="form-group">
                                <label for="Last name">Last Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="last_name"
                                    placeholder="Last name"
                                    v-model="form.last_name"
                                />
                            </div>
                            <div class="form-group">
                                <label for="Middle Name">Middle Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="middle_name"
                                    placeholder="Middle Name"
                                    v-model="form.middle_name"
                                />
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="address"
                                    placeholder="Address"
                                    v-model="form.address"
                                />
                            </div>
                            <div class="form-group">
                                <label for="department id">Department Id</label>
                                <select
                                    class="custom-select"
                                    id="department_id"
                                    name="department_id"
                                    v-model="form.department_id"
                                >
                                    <option
                                        v-for="department in departments"
                                        :key="department.id"
                                        :value="department.id"
                                        >{{ department.name }}</option
                                    >
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="country id">Country Id</label>
                                <select
                                    class="custom-select"
                                    id="country_id"
                                    name="country_id"
                                    v-model="form.country_id"
                                    @change="getStates()"
                                >
                                    <option
                                        v-for="country in countries"
                                        :key="country.id"
                                        :value="country.id"
                                        >{{ country.name }}</option
                                    >
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="state id">State Id</label>
                                <select
                                    class="custom-select"
                                    id="state_id"
                                    name="state_id"
                                    v-model="form.state_id"
                                    @change="getCities()"
                                >
                                    <option
                                        v-for="state in states"
                                        :key="state.id"
                                        :value="state.id"
                                        >{{ state.name }}</option
                                    >
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="city id">City Id</label>
                                <select
                                    class="custom-select"
                                    id="city_id"
                                    name="city_id"
                                    v-model="form.city_id"
                                >
                                    <option
                                        v-for="city in cities"
                                        :key="city.id"
                                        :value="city.id"
                                        >{{ city.name }}</option
                                    >
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="zip code">Zip code</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="zip_code"
                                    placeholder="Last name"
                                    v-model="form.zip_code"
                                />
                            </div>

                            <div class="form-group">
                                <label for="birthdate">Birthdate</label>
                                <datepicker
                                    input-class="form-control"
                                    :bootstrap-styling="true"
                                    placeholder="dd/mm/yyyy"
                                    name="birthdate"
                                    v-model="form.birthdate"
                                ></datepicker>
                            </div>
                            <div class="form-group">
                                <label for="date hired">Date Hired</label>
                                <datepicker
                                    input-class="form-control"
                                    :bootstrap-styling="true"
                                    placeholder="dd/mm/yyyy"
                                    name="date_hired"
                                    v-model="form.date_hired"
                                ></datepicker>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";
import moment from "moment";
export default {
    components: {
        Datepicker
    },
    data() {
        return {
            countries: [],
            states: [],
            cities: [],
            departments: [],
            form: {
                id: "",
                first_name: "",
                last_name: "",
                middle_name: "",
                address: "",
                department_id: "",
                country_id: "",
                state_id: "",
                city_id: "",
                zip_code: "",
                birthdate: "",
                date_hired: ""
            }
        };
    },
    created() {
        this.getCountries();
        this.getDepartments();
        this.getEmployee();
    },
    methods: {
        getEmployee() {
            axios
                .get("/api/employees/"+ this.$route.params.id)
                .then(res => {
                    this.form = res.data.data;
                    this.getStates();
                    this.getCities();
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
        getCountries() {
            axios
                .get("/api/employees/countries")
                .then(res => {
                    this.countries = res.data;
                })
                .catch(error => {
                    console.log(console.error);
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
        },
        getStates() {
            axios
                .get("/api/employees/" + this.form.country_id + "/states")
                .then(res => {
                    this.states = res.data;
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
        getCities() {
            axios
                .get("/api/employees/" + this.form.state_id + "/cities")
                .then(res => {
                    this.cities = res.data;
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
        updateEmployee() {
            axios
                .put("/api/employees/"+ this.$route.params.id, {
                    first_name: this.form.first_name,
                    last_name: this.form.last_name,
                    middle_name: this.form.middle_name,
                    address: this.form.address,
                    department_id: this.form.department_id,
                    country_id: this.form.country_id,
                    state_id: this.form.state_id,
                    city_id: this.form.city_id,
                    zip_code: this.form.zip_code,
                    birthdate: this.formate_date(this.form.birthdate),
                    date_hired: this.formate_date(this.form.date_hired)
                })
                .then(res => {
                    this.$router.push({ name: "EmployeesIndex" });
                });
        },
        formate_date(value) {
            if (value) {
                return moment(String(value)).format("YYYYMMDD");
            }
        }
    }
};
</script>

<style></style>
