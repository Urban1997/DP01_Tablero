<template>
    <div>
        <StatsDashboard />
        <h3 class="text-2xl font-bold mb-4">
            Reporte de enlaces administrativos
        </h3>

        <div class="bg-white shadow-md rounded-lg p-4 mb-4">
            <div class="grid grid-cols-1 gap-3">

                <div class="flex items-center gap-2">
                    <label class="text-sm font-semibold text-gray-600">
                        REPORTE DE MOVIMIENTO DE PERSONAL:
                    </label>
                    <span class="text-gray-800 font-medium">
                        REPORTE 2025 - MOVIMIENTOS ADMINISTRATIVOS
                    </span>
                </div>

                <div class="flex items-center gap-2">
                    <label class="text-sm font-semibold text-gray-600">
                        SECRETARÍA:
                    </label>
                    <span class="text-gray-800 font-medium">
                        SECRETARÍA DE FINANZAS
                    </span>
                </div>

            </div>
        </div>

        <DataTable
            v-model:filters="filters"
            :value="movimientos"
            ref="dt"
            paginator
            showGridlines
            responsiveLayout="scroll"
            :rows="10"
            :rowsPerPageOptions="[5, 10]"
            dataKey="no"
            filterDisplay="menu"
            v-model:expandedRows="expandedRows"
            :globalFilterFields="[
                'no',
                'control',
                'nombre',
                'secretaria',
                'movimiento',
                'fecha',
                'sueldoAnterior',
                'puestoAnterior',
                'departamentoAnterior',
                'direccionAnterior',
            ]"
        >
            <!-- HEADER -->
            <template #header>
                <div class="flex flex-wrap justify-between gap-2 mb-3">
                    <Button
                        type="button"
                        icon="pi pi-filter-slash"
                        label="Limpiar"
                        @click="clearFilter"
                        class="color-principal"
                    />
                    <div class="flex flex-wrap gap-2">
                        <InputText
                            v-model="filters['global'].value"
                            placeholder="Buscar"
                        />
                        <Button
                            icon="pi pi-file-excel"
                            label="Generar XLSX"
                            @click="exportExcel"
                            class="color-principal"
                        />
                    </div>
                </div>
            </template>

            <!-- EMPTY -->
            <template #empty> No se encontraron datos. </template>

            <!-- EXPANDER -->
            <Column expander style="width: 3rem" />

            <!-- COLUMNAS PRINCIPALES -->
            <Column
                field="no"
                header="N°"
                filterField="no"
                style="min-width: 80px"
            >
                <template #filter="{ filterModel }">
                    <InputText
                        v-model="filterModel.value"
                        placeholder="Buscar N°"
                    />
                </template>
            </Column>

            <Column
                field="control"
                header="No. de control"
                filterField="control"
                style="min-width: 200px"
            >
                <template #filter="{ filterModel }">
                    <InputText
                        v-model="filterModel.value"
                        placeholder="Buscar control"
                    />
                </template>
            </Column>

            <Column
                field="nombre"
                header="Nombre"
                filterField="nombre"
                style="min-width: 150px"
            >
                <template #filter="{ filterModel }">
                    <InputText
                        v-model="filterModel.value"
                        placeholder="Buscar nombre"
                    />
                </template>
            </Column>

            <Column
                field="secretaria"
                header="Secretaría"
                filterField="secretaria"
                style="min-width: 200px"
            >
                <template #filter="{ filterModel }">
                    <InputText
                        v-model="filterModel.value"
                        placeholder="Buscar secretaría"
                    />
                </template>
            </Column>

            <Column
                field="movimiento"
                header="Tipo de movimiento"
                filterField="movimiento"
                style="min-width: 200px"
            >
                <template #filter="{ filterModel }">
                    <InputText
                        v-model="filterModel.value"
                        placeholder="Buscar movimiento"
                    />
                </template>
            </Column>

            <Column
                field="fecha"
                header="Fecha"
                filterField="fecha"
                style="min-width: 150px"
            >
                <template #filter="{ filterModel }">
                    <InputText
                        v-model="filterModel.value"
                        placeholder="Buscar fecha"
                    />
                </template>
            </Column>

            <Column
                field="sueldoAnterior"
                header="Sueldo Anterior"
                filterField="sueldoAnterior"
                style="min-width: 150px"
            >
                <template #filter="{ filterModel }">
                    <InputText
                        v-model="filterModel.value"
                        placeholder="Buscar sueldo"
                    />
                </template>
            </Column>

            <Column
                field="puestoAnterior"
                header="Puesto Anterior"
                filterField="puestoAnterior"
                style="min-width: 150px"
            >
                <template #filter="{ filterModel }">
                    <InputText
                        v-model="filterModel.value"
                        placeholder="Buscar puesto"
                    />
                </template>
            </Column>

            <!-- EXPANSIÓN -->
            <template #expansion="{ data }">
                <div class="p-4 bg-gray-50">
                    <h3 class="font-bold mb-2">Más detalles</h3>

                    <p>
                        <strong>Departamento Anterior:</strong>
                        {{ data.departamentoAnterior }}
                    </p>
                    <p>
                        <strong>Dirección Anterior:</strong>
                        {{ data.direccionAnterior }}
                    </p>
                    <p><strong>Sueldo:</strong> {{ data.sueldo }}</p>
                    <p>
                        <strong>Puesto Propuesto:</strong>
                        {{ data.puestoPropuesto }}
                    </p>
                    <p>
                        <strong>Departamento Propuesto:</strong>
                        {{ data.departamentoPropuesto }}
                    </p>
                    <p>
                        <strong>Dirección Propuesta:</strong>
                        {{ data.direccionPropuesta }}
                    </p>
                    <p>
                        <strong>Ocupa la plaza y/o recurso de:</strong>
                        {{ data.ocupaPlaza }}
                    </p>
                    <p>
                        <strong>No Control plaza:</strong>
                        {{ data.noControlPlaza }}
                    </p>
                    <p><strong>Remanente:</strong> {{ data.remanente }}</p>
                    <p>
                        <strong>Observaciones:</strong> {{ data.observaciones }}
                    </p>
                    <p><strong>Motivo:</strong> {{ data.motivo }}</p>
                </div>
            </template>
        </DataTable>

        <div class="flex justify-end mt-2">
            <span class="text-sm text-black font-bold">
                FORM.357-A.2025/SECATI.DGDFP/J/2427
            </span>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import StatsDashboard from "@/components/StatsDashboard.vue";
import * as XLSX from "xlsx";

const dt = ref();
const expandedRows = ref([]);

const movimientos = ref([
    {
        no: 1,
        control: "C-1001",
        nombre: "Juan Pérez",
        secretaria: "Finanzas",
        movimiento: "Cambio",
        fecha: "2025-03-01",
        sueldoAnterior: "$12,000",
        puestoAnterior: "Auxiliar",
        departamentoAnterior: "Tesorería",
        direccionAnterior: "Edificio Central",
        sueldo: "$14,000",
        puestoPropuesto: "Analista",
        departamentoPropuesto: "Finanzas",
        direccionPropuesta: "Oficina Central",
        observaciones: "Promoción",
        motivo: "Desempeño",
        ocupaPlaza: "Plaza 001",
        noControlPlaza: "P-001",
        remanente: "No aplica",
    },
]);

const filters = ref({
    global: { value: null },
    no: { value: null },
    control: { value: null },
    nombre: { value: null },
    secretaria: { value: null },
    movimiento: { value: null },
    fecha: { value: null },
    sueldoAnterior: { value: null },
    puestoAnterior: { value: null },
    departamentoAnterior: { value: null },
    direccionAnterior: { value: null },
});

const clearFilter = () => {
    filters.value = {
        global: { value: null },
        no: { value: null },
        control: { value: null },
        nombre: { value: null },
        secretaria: { value: null },
        movimiento: { value: null },
        fecha: { value: null },
        sueldoAnterior: { value: null },
        puestoAnterior: { value: null },
        departamentoAnterior: { value: null },
        direccionAnterior: { value: null },
    };
};

const exportExcel = () => {
    const data = movimientos.value.map((item) => ({
        "N°": item.no,
        "No. de control": item.control,
        "Nombre": item.nombre,
        "Secretaría": item.secretaria,
        "Movimiento": item.movimiento,
        "Fecha": item.fecha,
        "Sueldo Anterior": item.sueldoAnterior,
        "Puesto Anterior": item.puestoAnterior,
        "Departamento Anterior": item.departamentoAnterior,
        "Dirección Anterior": item.direccionAnterior,
        "Sueldo": item.sueldo,
        "Puesto Propuesto": item.puestoPropuesto,
        "Departamento Propuesto": item.departamentoPropuesto,
        "Dirección Propuesta": item.direccionPropuesta,
        "Ocupa Plaza": item.ocupaPlaza,
        "No Control Plaza": item.noControlPlaza,
        "Remanente": item.remanente,
        "Observaciones": item.observaciones,
        "Motivo": item.motivo,
    }));

    const worksheet = XLSX.utils.json_to_sheet(data);
    const workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, "Reporte");

    XLSX.writeFile(workbook, "reporte-movimientos.xlsx");
};

const exportCSV = () => {
    dt.value?.exportCSV();
};
</script>
