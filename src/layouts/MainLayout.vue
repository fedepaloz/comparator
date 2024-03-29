<template>
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
              :disable="moduleValues.gasInterested === false"
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
                  :rules="[(val) => val || 'Compilare il campo']"
                />
                <q-input
                  class="col-3"
                  type="number"
                  filled
                  v-model.trim="moduleValues.gasFirstMonthConsumptionOnBill"
                  label="Consume mese 1 in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.gasSecondMonthConsumptionOnBill"
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
                  :rules="[(val) => val || 'Compilare il campo']"
                /><q-input
                  class="col-3"
                  type="number"
                  filled
                  v-model.trim="moduleValues.gasAnnualConsumptionOnBill"
                  label="Consumo annuo in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  class="col-3"
                  type="number"
                  filled
                  v-model.trim="moduleValues.gasFirstYearOnBill"
                  label="Anno 1 in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.gasSecondYearOnBill"
                  label="Anno 2 in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.gasFirstMonthOnBill"
                  label="Mese 1 in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.gasSecondMonthOnBill"
                  label="Mese 2 in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.gasVatOnBill"
                  label="IVA in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.gasExpense"
                  label="Spesa per il gas"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.gasManagementCost"
                  label="Spesa per trasporto e gestione contatore"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.gasSystemCharges"
                  label="Spese per oneri di sistema"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.gasOtherCosts"
                  label="Altre partite"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.gasExcise"
                  label="Accise"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.gasVat"
                  label="IVA"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.rai"
                  label="Canone rai"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                />
              </q-form>
            </q-step>

            <q-step
              :disable="moduleValues.energyInterested === false"
              :name="3"
              title="Luce"
              icon="assignment"
              caption="Compila il questionario"
            >
              <!-- FORM DEL COMPARATORE DELLA LUCE -->
              {{ billCadenceOptions.label }}
              <q-form class="q-gutter-md row">
                <q-select
                  class="col-3"
                  filled
                  v-model="moduleValues.energyBillCadenceModel"
                  label="Bimestrale/Semestrale"
                  :options="billCadenceOptions"
                  lazy-rules
                  :rules="[(val) => val || 'Compilare il campo']"
                />
                <q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.energyFirstMonthConsumptionOnBill"
                  label="Consume mese 1 in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.energySecondMonthConsumptionOnBill"
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
                  :rules="[(val) => val || 'Compilare il campo']"
                />
                <q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.energyCommittedPower"
                  label="Potenza impegnata"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.energyAvailablePower"
                  label="Potenza disponibile"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.energyAnnualConsumptionOnBill"
                  label="Consumo annuo in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.energyFirstYearOnBill"
                  label="Anno 1 in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.energySecondYearOnBill"
                  label="Anno 2 in bolletta"
                  lazy-rules="true"
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.energyFirstMonthOnBill"
                  label="Mese 1 in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.energySecondMonthOnBill"
                  label="Mese 2 in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.energyVatOnBill"
                  label="IVA in bolletta"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.energyExpense"
                  label="Spesa per l'energia"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.energyManagementCost"
                  label="Spesa per trasporto e gestione contatore"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.energySystemCharges"
                  label="Spese per oneri di sistema"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.energyOtherCosts"
                  label="Altre partite"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.energyExcise"
                  label="Accise"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Compilare il campo',
                  ]"
                /><q-input
                  type="number"
                  class="col-3"
                  filled
                  v-model.trim="moduleValues.energyVat"
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
                  v-model.trim="moduleValues.clientName"
                  label="Nome"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Please type something',
                  ]"
                />
                <q-input
                  class="col-6"
                  filled
                  v-model.trim="moduleValues.clientLastname"
                  label="Cognome"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Please type something',
                  ]"
                />
                <q-input
                  class="col-6"
                  filled
                  v-model.trim="moduleValues.clientEmail"
                  label="Email"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Please type something',
                  ]"
                />
                <q-input
                  class="col-6"
                  filled
                  v-model.trim="moduleValues.clientPhoneNmber"
                  label="Numero di telefono"
                  lazy-rules
                  :rules="[
                    (val) => (val && val.length > 0) || 'Please type something',
                  ]"
                />
                <q-input
                  class="col-6"
                  filled
                  v-model.trim="moduleValues.clientTaxCode"
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
const billCadenceOptions = ref([
  {
    id: "monthly",
    label: "mensile",
  },
  {
    id: "bimonthly",
    label: "bimestrale",
  },
]);
const clientTypeOptions = ref([
  { id: "private", label: "privato" },
  { id: "VAT", label: "partita iva" },
]);

const moduleValues = ref({
  gasInterested: false,
  energyInterested: false,
  compilationDate: new Date(),
});

const name = ref("");
const step = ref(1);

const sendDataToBackEnd = () => {
  const {
    energyBillCadenceModel,
    gasBillCadenceModel,
    gasClientTypeModel,
    ...rest
  } = moduleValues.value;

  const data = {
    ...rest,
    gasBillCadenceModel: gasBillCadenceModel.id,
    gasClientTypeModel: gasClientTypeModel.id,
    energyBillCadenceModel: energyBillCadenceModel.id,
  };

  console.log(data, "data");

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
