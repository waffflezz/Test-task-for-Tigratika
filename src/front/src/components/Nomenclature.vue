<script>
import Item from "@/components/Item.vue";
import SubItem from "@/components/SubItem.vue";

export default {
  name: "Nomenclature",
  components: {SubItem, Item}
}
</script>

<template>
  <div class="bg-white border-0 rounded-lg h-full">
    <div class="pl-32 pr-[152px]">
      <nav class="grid grid-cols-12 text-xl font-bold">
        <div class="col-span-3">Наименование</div>
        <div class="col-span-2">Кол-во</div>
        <div class="col-span-2">Источник</div>
        <div class="grid grid-cols-4 col-span-4">
          <div>Лазер</div>
          <div>Сварка</div>
          <div>Сборка</div>
          <div>Электр</div>
        </div>
      </nav>
    </div>
    <item :show-sub-items="false"></item>
    <item :show-sub-items="false"></item>
  </div>
</template>