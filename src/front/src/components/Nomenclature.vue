<script>
import Item from "@/components/Item.vue";
import SubItem from "@/components/SubItem.vue";
import axios from "axios";

const address = 'http://localhost:8082'

export default {
  name: "Nomenclature",
  components: {SubItem, Item},
  data() {
    return {
      items: []
    }
  },
  methods: {
    async moveItem({id, index, direction}) {
      const newIndex = direction === 'up' ? index - 1 : index + 1;

      [this.items[index], this.items[newIndex]] = [this.items[newIndex], this.items[index]];

      await axios.post(`${address}/api/products/move`, {
        id,
        direction
      }).then(function (response) {
        console.log(response);
      })
    },
    async destroy({id, index}) {
      this.items.splice(index, 1);

      await axios.delete(`${address}/api/products/${id}`)
          .then(function (response) {
            console.log(response)
          })
          .catch(function (error) {
            console.log(error)
          })
    }
  },
  async mounted() {
    this.items = await axios.get(`${address}/api/products`)
        .then(function (response) {
          return response.data;
        });
  }
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
    <item
        v-for="(item, index) in items"
        :key="item.id"
        :data="item"
        :index="index"
        :can-move-up="index > 0"
        :can-move-down="index < items.length - 1"
        @move-item="moveItem"
        @destroy="destroy"
    ></item>
  </div>
</template>