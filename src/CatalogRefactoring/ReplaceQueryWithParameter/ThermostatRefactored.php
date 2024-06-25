<?php

namespace App\CatalogRefactoring\ReplaceQueryWithParameter;
/*

Replace Query With Parameter

Ao examinar o corpo de uma função, às vezes vejo referências a algo no escopo da função com o
qual não estou satisfeito. Pode ser uma referência a uma variável global ou a um elemento do
mesmo módulo que pretendo afastar. Para resolver isso, preciso substituir a referência interna por
um parâmetro, transferindo a responsabilidade de resolver a referência para quem
chama a função.

Passos: 
1 - Use Extrair variável (119) no código de consulta para separá-lo do restante do
corpo da função
2 - Aplique a função Extract (106) ao código do corpo que não é a chamada para a consulta.
3 - Use Variável Inline (123) para se livrar da variável que você acabou de criar
4 - Aplique Função Inline (115) à função original.
5 - Renomeie a nova função para a original.

*/

class ThermostatRefactored
{
    private HeatingPlanRefactored $heatingPlan;
    private object $thermostat;
    public function __construct(
        protected float $current_temperature
    ) {
        $this->heatingPlan = new HeatingPlanRefactored();
        $this->thermostat = (object)['selected_temperature' => $current_temperature];
    }

    public function getTargetTemperature()
    {

        if ($this->heatingPlan->getTargetTemperature($this->thermostat->selected_temperature) > $this->current_temperature) {
            return $this->setToHeat();
        } elseif ($this->heatingPlan->getTargetTemperature($this->thermostat->selected_temperature) < $this->current_temperature) {
            return $this->setToCool();
        } else {
            return $this->setOff();
        }
    }

    private function setToHeat()
    {
        // Implement your heating logic here
        return "Heating mode activated";
    }

    private function setToCool()
    {
        // Implement your cooling logic here
        return "Cooling mode activated";
    }

    private function setOff()
    {
        // Implement your turn-off logic here
        return "Thermostat turned off";
    }
}
