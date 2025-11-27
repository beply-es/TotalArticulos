<?php
/**
 * This file is part of TotalArticulos plugin for FacturaScripts
 * Copyright (C) 2024
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace FacturaScripts\Plugins\TotalArticulos\Mod;

use FacturaScripts\Core\Contract\PurchasesModInterface;
use FacturaScripts\Core\Model\Base\PurchaseDocument;
use FacturaScripts\Core\Tools;

/**
 * Muestra el total de artículos (suma de cantidades) en documentos de compra
 */
class PurchasesHeaderHTMLMod implements PurchasesModInterface
{
    public function apply(PurchaseDocument &$model, array $formData): void
    {
    }

    public function applyBefore(PurchaseDocument &$model, array $formData): void
    {
    }

    public function assets(): void
    {
    }

    public function newBtnFields(): array
    {
        return [];
    }

    public function newFields(): array
    {
        return ['totalArticulos'];
    }

    public function newModalFields(): array
    {
        return [];
    }

    public function renderField(PurchaseDocument $model, string $field): ?string
    {
        if ($field === 'totalArticulos') {
            return $this->renderTotalArticulos($model);
        }

        return null;
    }

    private function calculateTotalArticulos(PurchaseDocument $model): float
    {
        $total = 0.0;
        foreach ($model->getLines() as $line) {
            $total += (float) $line->cantidad;
        }
        return $total;
    }

    private function renderTotalArticulos(PurchaseDocument $model): string
    {
        $total = $this->calculateTotalArticulos($model);

        return '<div class="col-sm-6 col-md-4 col-lg">'
            . '<div class="mb-2">'
            . Tools::trans('total-items')
            . '<input type="text" value="' . $total . '" class="form-control" readonly disabled/>'
            . '</div>'
            . '</div>';
    }
}
