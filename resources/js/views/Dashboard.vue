<template>
    <div>
        <StatsDashboard
            :altas="totales.altas"
            :reingresos="totales.reingresos"
            :bajas="totales.bajas"
            :cambios="totales.cambios"
            :total="totales.total"
        />
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
                :showFilterMatchModes="false"
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
                :showFilterMatchModes="false"
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
                 :showFilterMatchModes="false"
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
                :showFilterMatchModes="false"
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
                :showFilterMatchModes="false"
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
                :showFilterMatchModes="false"
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
                :showFilterMatchModes="false"
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
                :showFilterMatchModes="false"
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
import '../../css/app.css'
import { ref, onMounted } from "vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import StatsDashboard from "@/components/StatsDashboard.vue";
import * as XLSX from "xlsx";

import { obtenerDetalles } from "@/services/DetallesService";

const dt = ref();
const expandedRows = ref([]);
const movimientos = ref([]);

const totales = ref({
    altas: 0,
    reingresos: 0,
    bajas: 0,
    cambios: 0,
    total: 0,
});

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

// Cargar datos desde API
const cargarMovimientos = async () => {
    try {
        const ctrl = "Uy5TRUdVUklEQUQ";

        const response = await obtenerDetalles(ctrl);

        console.log("Respuesta completa:", response);

        const data = response?.data ?? response;

        if (!Array.isArray(data) || data.length === 0) {
            console.warn("Sin datos para mostrar");
            movimientos.value = [];
            return;
        }

        movimientos.value = data.map((item, index) => ({
            no: index + 1,
            control: item.NO_CTRL || "",
            nombre: item.NOMBRE || "",
            secretaria: item.SECRETARIA || "",
            movimiento: item.TIPO || "",
            fecha: item.FECHA || "",
            sueldoAnterior: item.SUELDO_ANT || "",
            puestoAnterior: item.PUESTA_ANT || "",
            departamentoAnterior: item.DEPTO_ANT || "",
            direccionAnterior: item.DIREC_ANT || "",
            sueldo: item.SUELDO_ACT || "",
            puestoPropuesto: item.PUESTO || "",
            departamentoPropuesto: item.DEPTO_ACT || "",
            direccionPropuesta: item.DIR_ACT || "",
            observaciones: item.OBSERVACIONES || "",
            motivo: item.MOTIVO || "",
            remanente: item.REMANENTE || "",
            ocupaPlaza: item.NOMBRE_VACANTE || "",
            noControlPlaza: item.NOCTRL_VACANTE || "",
        }));
        // 🔵 CALCULAR TOTALES
        totales.value.altas = data.filter((x) => x.TIPO === "ALTA").length;
        totales.value.reingresos = data.filter(
            (x) => x.TIPO === "REINGRESO",
        ).length;
        totales.value.bajas = data.filter((x) => x.TIPO === "BAJA").length;
        totales.value.cambios = data.filter((x) => x.TIPO === "CAMBIO").length;
        totales.value.total = data.length;

        console.log("Movimientos mapeados:", movimientos.value);
        console.log("Totales:", totales.value);
    } catch (error) {
        console.error("Error cargando datos:", error);
    }
};

// Ejecutar al montar
onMounted(() => {
    cargarMovimientos();
});

// Limpiar filtros
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

// Exportar Excel
const exportExcel = () => {
    const filteredData = dt.value?.processedData || [];

    const data = filteredData.map((item) => ({
        "N°": item.no,
        "No. de control": item.control,
        Nombre: item.nombre,
        Secretaría: item.secretaria,
        Movimiento: item.movimiento,
        Fecha: item.fecha,
        "Sueldo Anterior": item.sueldoAnterior,
        "Puesto Anterior": item.puestoAnterior,
        "Departamento Anterior": item.departamentoAnterior,
        "Dirección Anterior": item.direccionAnterior,
        Sueldo: item.sueldo,
        "Puesto Propuesto": item.puestoPropuesto,
        "Departamento Propuesto": item.departamentoPropuesto,
        "Dirección Propuesta": item.direccionPropuesta,
        "Ocupa Plaza": item.ocupaPlaza,
        "No Control Plaza": item.noControlPlaza,
        Remanente: item.remanente,
        Observaciones: item.observaciones,
        Motivo: item.motivo,
    }));

    const worksheet = XLSX.utils.json_to_sheet(data);
    const workbook = XLSX.utils.book_new();

    XLSX.utils.book_append_sheet(workbook, worksheet, "Reporte");

    XLSX.writeFile(workbook, "reporte-movimientos.xlsx");
};

// Exportar CSV
const exportCSV = () => {
    dt.value?.exportCSV();
};
</script>
