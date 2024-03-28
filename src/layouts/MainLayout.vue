<template>
  <!-- <div>
    <input v-model="name" type="text" />
    <button @click="postData">Send Data</button>
  </div>
  {{}} -->

  <q-layout>
    <q-page-container>
      <q-page>
        <div class="q-pa-md">
          <q-stepper v-model="step" ref="stepper" color="primary" animated>
            <q-step
              :name="1"
              title="Seleziona tipo di fornitura"
              icon="settings"
              :done="step > 1"
            >
              <h6>A quale contratto sei interessato?</h6>
              <div>
                <q-checkbox v-model="moduleValues.gasInterested" label="Gas" />
              </div>
              <div>
                <q-checkbox
                  v-model="moduleValues.energyInterested"
                  label="Luce"
                />
              </div>
            </q-step>
            <!-- questionario contratto gas -->
            <q-step
              :name="2"
              title="Gas"
              caption="Compila il questionario"
              icon="create_new_folder"
              :done="step > 2"
            >
              <!-- FORM DEL COMPARATORE DEL GAS -->
              <q-form class="q-gutter-md row">
                <q-select
                  class="col-3"
                  filled
                  v-model="moduleValues.gasBillCadenceModel"
                  label="Bimestrale/Semestrale"
                  :options="billCadenceOptions"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                />
                <q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.gasFirstMonthConsumptionOnBill"
                  label="Consume mese 1 in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.gasSecondMonthConsumptionOnBill"
                  label="Consume mese 2 in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-select
                  class="col-3"
                  filled
                  v-model="moduleValues.gasClientTypeModel"
                  label="Tipo cliente"
                  :options="clientTypeOptions"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.gasAnnualConsumptionOnBill"
                  label="Consumo annuo in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.gasFirstYearOnBill"
                  label="Anno 1 in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.gasSecondYearOnBill"
                  label="Anno 2 in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.gasFirstMonthOnBill"
                  label="Mese 1 in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.gasSecondMonthOnBill"
                  label="Mese 2 in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.gasVatOnBill"
                  label="IVA in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.gasExpense"
                  label="Spesa per il gas"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.gasManagementCost"
                  label="Spesa per trasporto e gestione contatore"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.gasSystemCharges"
                  label="Spese per oneri di sistema"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.gasOtherCosts"
                  label="Altre partite"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.gasExcise"
                  label="Accise"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.gasVat"
                  label="IVA"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.rai"
                  label="IVA"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                />
              </q-form>
            </q-step>

            <q-step
              :name="3"
              title="Luce"
              icon="assignment"
              caption="Compila il questionario"
            >
              <!-- FORM DEL COMPARATORE DELLA LUCE -->
              <q-form class="q-gutter-md row">
                <q-select
                  class="col-3"
                  filled
                  v-model="moduleValues.energyBillCadenceModel"
                  label="Bimestrale/Semestrale"
                  :options="billCadenceOptions"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                />
                <q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.energyFirstMonthConsumptionOnBill"
                  label="Consume mese 1 in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.energySecondMonthConsumptionOnBill"
                  label="Consume mese 2 in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-select
                  class="col-3"
                  filled
                  v-model="moduleValues.energyClientTypeModel"
                  label="Tipo cliente"
                  :options="clientTypeOptions"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.energyCommittedPower"
                  label="Potenza impegnata"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.energyAvailablePower"
                  label="Potenza disponibile"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.energyAnnualConsumptionOnBill"
                  label="Consumo annuo in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.energyFirstYearOnBill"
                  label="Anno 1 in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.energySecondYearOnBill"
                  label="Anno 2 in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.energyFirstMonthOnBill"
                  label="Mese 1 in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.energySecondMonthOnBill"
                  label="Mese 2 in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.energyVatOnBill"
                  label="IVA in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.energyExpense"
                  label="Spesa per l'energia"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.energyManagementCost"
                  label="Spesa per trasporto e gestione contatore"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.energySystemCharges"
                  label="Spese per oneri di sistema"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.energyOtherCosts"
                  label="Altre partite"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.energyExcise"
                  label="Accise"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  filled
                  v-model="moduleValues.energyVat"
                  label="IVA"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                />
              </q-form>
            </q-step>
            <!-- form dati personali -->

            <q-step
              :name="4"
              title="Dati personali"
              icon="assignment"
              caption="Compila il questionario"
            >
              <q-form class="q-gutter-md row">
                <q-input
                  class="col-6"
                  filled
                  v-model="moduleValues.clientName"
                  label="Nome"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Please type something',
                  ]"
                />
                <q-input
                  class="col-6"
                  filled
                  v-model="moduleValues.clientLastname"
                  label="Cognome"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Please type something',
                  ]"
                />
                <q-input
                  class="col-6"
                  filled
                  v-model="moduleValues.clientEmail"
                  label="Email"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Please type something',
                  ]"
                />
                <q-input
                  class="col-6"
                  filled
                  v-model="moduleValues.clientPhoneNmber"
                  label="Numero di telefono"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Please type something',
                  ]"
                />
                <q-input
                  class="col-6"
                  filled
                  v-model="moduleValues.clientTaxCode"
                  label="Partita IVA"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Please type something',
                  ]"
                />

                <div>
                  <q-btn
                    @click="sendDataToBackEnd"
                    label="Submit"
                    type="submit"
                    color="primary"
                  />
                </div> </q-form
            ></q-step>

            <template v-slot:navigation>
              <q-stepper-navigation>
                <q-btn
                  @click="$refs.stepper.next()"
                  color="primary"
                  :label="step === 4 ? 'Finish' : 'Continue'"
                />
                <q-btn
                  v-if="step > 1"
                  flat
                  color="primary"
                  @click="$refs.stepper.previous()"
                  label="Back"
                  class="q-ml-sm"
                />
              </q-stepper-navigation>
            </template>
          </q-stepper>
        </div>
      </q-page>
    </q-page-container>
  </q-layout>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";

//scelta del tipo di contratto

const isDisabled = ref(false);

//questionario
const billCadenceOptions = ref(["monthly", "bimonthly"]);
const clientTypeOptions = ref(["private", "VAT"]);

//const contractTypeModel = ref(null);
//const gasClientTypeModel = ref(null);
//const gasBillCadenceModel = ref(null);

// //questinario gas
// const gasAnnualConsumptionOnBill = ref(null);
// const gasFirstYearOnBill = ref(null);
// const gasSecondYearOnBill = ref(null);
// const gasFirstMonthOnBill = ref(null);
// const gasSecondMonthOnBill = ref(null);
// const gasFirstMonthConsumptionOnBill = ref(null);
// const gasSecondMonthConsumptionOnBill = ref(null);
// const gasVatOnBill = ref(null);
// const gasExpense = ref(null);
// const gasManagementCost = ref(null);
// const gasSystemCharges = ref(null);
// const gasOtherCosts = ref(null);
// const gasExcise = ref(null);
// const gasVat = ref(null);

// //questionario luce

// const energyBillCadenceModel = ref(null);
// const energyFirstMonthConsumptionOnBill = ref(null);
// const energySecondMonthConsumptionOnBill = ref(null);
// const energyClientTypeModel = ref(null);
// const energyCommittedPower = ref(null);
// const energyAvailablePower = ref(null);
// const energyAnnualConsumptionOnBill = ref(null);
// const energyFirstYearOnbill = ref(null);
// const energySecondYearOnbill = ref(null);
// const energyFirstMonthOnBill = ref(null);
// const energySecondMonthOnBill = ref(null);
// const energyVatOnBill = ref(null);
// const energyExpense = ref(null);
// const energyManagementCost = ref(null);
// const energySystemCharges = ref(null);
// const energyOtherCosts = ref(null);
// const energyExcise = ref(null);
// const energyVat = ref(null);
// const rai = ref(null);
// //questionario anagrafiche
// const clientName = ref(null);
// const clientLastname = ref(null);
// const clientEmail = ref(null);
// const clientPhoneNmber = ref(null);
// const clientTaxCode = ref(null);

const moduleValues = ref({
  gasInterested: false,
  energyInterested: false,
  compilationDate: "",
});

const name = ref("");
const step = ref(1);

const sendDataToBackEnd = () => {
  const data = moduleValues.value;
  // {
  //   name: clientName.value,
  //   lastname: clientLastname.value,
  //   email: clientEmail.value,
  //   phone_number: clientPhoneNmber.value,
  //   compilation_date: "",
  //   tax_code: clientTaxCode.value,
  //   energy_bill_cadence: energyBillCadenceModel.value,
  //   gas_bill_cadence: gasBillCadenceModel.value,
  //   energy_first_month_consumption: energyFirstMonthConsumptionOnBill.value,
  //   energy_second_month_consumption: energySecondMonthConsumptionOnBill.value,
  //   energy_client_type: energyClientTypeModel.value,
  //   energy_committed_power: energyCommittedPower.value,
  //   energy_available_power: energyAvailablePower.value,
  //   energy_annual_consumption_on_bill: energyAnnualConsumptionOnBill.value,
  //   energy_first_year_on_bill: energyFirstYearOnbill.value,
  //   energy_second_year_on_bill: energySecondYearOnbill.value,
  //   energy_first_month_on_bill: energyFirstMonthOnBill.value,
  //   energy_second_month_on_bill: energySecondMonthOnBill.value,
  //   energy_vat_on_bill: energyVatOnBill.value,
  //   energy_interested: contractTypeModel.value,
  //   gas_interested: contractTypeModel.value,
  //   energy_expense: energyExpense.value,
  //   energy_management_cost: energyManagementCost.value,
  //   energy_system_charges: energySystemCharges.value,
  //   energy_other_costs: energyOtherCosts.value,
  //   energy_excise: energyExcise.value,
  //   energy_vat: energyVat.value,
  //   energy_rai_fee: rai.value,
  //   gas_first_month_consumption: gasFirstMonthConsumptionOnBill.value,
  //   gas_second_month_consumption: gasSecondMonthConsumptionOnBill.value,
  //   gas_client_type: gasClientTypeModel.value,
  //   gas_annual_consumption_on_bill: gasAnnualConsumptionOnBill.value,
  //   gas_first_year_on_bill: gasFirstYearOnBill.value,
  //   gas_second_year_on_bill: gasSecondYearOnBill.value,
  //   gas_first_month_on_bill: gasFirstMonthOnBill.value,
  //   gas_second_month_on_bill: gasSecondMonthOnBill.value,
  //   gas_vat_on_bill: gasVatOnBill.value,
  //   gas_expense: gasExpense.value,
  //   gas_management_cost: gasManagementCost.value,
  //   gas_system_charges: gasSystemCharges.value,
  //   gas_other_costs: gasOtherCosts.value,
  //   gas_excise: gasExcise.value,
  //   gas_vat: gasVat.value,
  // };

  axios
    .post("http://localhost/comparator/backend/post_handler.php", data)
    .then((response) => {
      console.log(response.data);
    })
    .catch((error) => {
      console.error("Error:", error);
    });
};
</script>

<style></style>
