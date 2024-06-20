<?php

namespace App\CatalogRefactoring\RemoveFlagArgument;

/*

Remove Flag Argument
Um argumento flag é um argumento de função que o chamador usa para indicar qual lógica a
função chamada deve executar

Passos:
1- Crie uma função explícita para cada valor do parâmetro.
   Se a função principal tiver uma condicional de despacho clara, use Decompose Conditional
(260) para criar as funções explícitas. Caso contrário, crie funções de empacotamento.
2 - Para cada chamador que usa um valor literal para o parâmetro, substitua-o por uma chamada para
a função explícita.
*/

class DeliveryRefactored
{

   public function rushDeliveryDate($order)
   {
      $deliveryTime = null;
      if (in_array($order['delivery_state'], ["MA", "CT"])) {
         $deliveryTime = 1;
      } elseif (in_array($order['delivery_state'], ["NY", "NH"])) {
         $deliveryTime = 2;
      } else {
         $deliveryTime = 3;
      }
      return date("Y-m-d", strtotime($order['placed_on'] . " +" . (1 + $deliveryTime) . "days"));
   }
   public function regularDeliveryDate($order)
   {
      $deliveryTime = null;
      if (in_array($order['delivery_state'], ["MA", "CT", "NY"])) {
         $deliveryTime = 2;
      } elseif (in_array($order['delivery_state'], ["ME", "NH"])) {
         $deliveryTime = 3;
      } else {
         $deliveryTime = 4;
      }
      return date("Y-m-d", strtotime($order['placed_on'] . " +" . (2 + $deliveryTime) . "days"));
   }
}
