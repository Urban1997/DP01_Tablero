<template>
  <div class="bg-surface-50 dark:bg-surface-950 px-6 py-8 md:px-12 lg:px-20">

    <h2 class="text-2xl font-bold text-surface-900 dark:text-surface-0 mb-4">
      Resumen de Movimientos
    </h2>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-5">

      <!-- TOTAL ALTAS -->
      <Card class="shadow-2xl rounded-xl bg-white dark:bg-surface-900"
            style="box-shadow: 0 12px 25px rgba(0, 0, 0, 0.25);">
        <template #content>
          <div class="flex justify-between items-center gap-4">
            <div class="flex flex-col">
              <span class="text-xs font-bold text-surface-700 dark:text-surface-200">
                TOTAL ALTAS
              </span>
              <div class="text-surface-900 dark:text-surface-0 font-bold text-xl">
                  {{ altas }}
              </div>
            </div>
            <div class="flex items-center justify-center bg-gradient-to-b from-green-400 to-green-600 rounded-lg w-11 h-11 shadow-lg">
              <i class="pi pi-plus text-white text-lg"></i>
            </div>
          </div>
        </template>
      </Card>

      <!-- TOTAL REINGRESO -->
      <Card class="shadow-2xl rounded-xl bg-white dark:bg-surface-900"
            style="box-shadow: 0 12px 25px rgba(0, 0, 0, 0.25);">
        <template #content>
          <div class="flex justify-between items-center gap-4">
            <div class="flex flex-col">
              <span class="text-xs font-bold text-surface-700 dark:text-surface-200">
                TOTAL REINGRESO
              </span>
              <div class="text-surface-900 dark:text-surface-0 font-bold text-xl">
               {{ reingresos }}
              </div>
            </div>
            <div class="flex items-center justify-center bg-gradient-to-b from-blue-400 to-blue-600 rounded-lg w-11 h-11 shadow-lg">
              <i class="pi pi-refresh text-white text-lg"></i>
            </div>
          </div>
        </template>
      </Card>

      <!-- TOTAL BAJAS -->
      <Card class="shadow-2xl rounded-xl bg-white dark:bg-surface-900"
            style="box-shadow: 0 12px 25px rgba(0, 0, 0, 0.25);">
        <template #content>
          <div class="flex justify-between items-center gap-4">
            <div class="flex flex-col">
              <span class="text-xs font-bold text-surface-700 dark:text-surface-200">
                TOTAL BAJAS
              </span>
              <div class="text-surface-900 dark:text-surface-0 font-bold text-xl">
                {{ bajas }}
              </div>
            </div>
            <div class="flex items-center justify-center bg-gradient-to-b from-red-400 to-red-600 rounded-lg w-11 h-11 shadow-lg">
              <i class="pi pi-times text-white text-lg"></i>
            </div>
          </div>
        </template>
      </Card>

      <!-- TOTAL CAMBIOS -->
      <Card class="shadow-2xl rounded-xl bg-white dark:bg-surface-900"
            style="box-shadow: 0 12px 25px rgba(0, 0, 0, 0.25);">
        <template #content>
          <div class="flex justify-between items-center gap-4">
            <div class="flex flex-col">
              <span class="text-xs font-bold text-surface-700 dark:text-surface-200">
                TOTAL CAMBIOS
              </span>
              <div class="text-surface-900 dark:text-surface-0 font-bold text-xl">
                 {{ cambios }}
              </div>
            </div>
            <div class="flex items-center justify-center bg-gradient-to-b from-orange-400 to-orange-600 rounded-lg w-11 h-11 shadow-lg">
              <i class="pi pi-user-edit text-white text-lg"></i>
            </div>
          </div>
        </template>
      </Card>

      <!-- TOTAL MOVIMIENTOS -->
      <Card class="shadow-2xl rounded-xl bg-white dark:bg-surface-900"
            style="box-shadow: 0 12px 25px rgba(0, 0, 0, 0.25);">
        <template #content>
          <div class="flex justify-between items-center gap-4">
            <div class="flex flex-col">
              <span class="text-xs font-bold text-surface-700 dark:text-surface-200">
                TOTAL MOVIMIENTOS
              </span>
              <div class="text-surface-900 dark:text-surface-0 font-bold text-xl">
              {{ total }}
              </div>
            </div>
            <div class="flex items-center justify-center bg-gradient-to-b from-slate-400 to-slate-600 rounded-lg w-11 h-11 shadow-lg">
              <i class="pi pi-list text-white text-lg"></i>
            </div>
          </div>
        </template>
      </Card>

    </div>
  </div>
</template>

<script setup>
import Card from 'primevue/card'

defineProps({
  altas: Number,
  reingresos: Number,
  bajas: Number,
  cambios: Number,
  total: Number
})
</script>
