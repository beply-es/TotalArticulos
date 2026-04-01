# TotalArticulos

Muestra el total de artículos en documentos de venta y compra.

## Estado y compatibilidad

| Campo | Valor |
| --- | --- |
| Estado | Activo |
| Tipo | Plugin funcional ERP |
| Nombre de plugin | `TotalArticulos` |
| Version actual | `1` |
| Compatibilidad declarada | `FacturaScripts 2025+` |
| PHP minimo declarado | `No declarado` |
| Stack objetivo Beply | `FacturaScripts 2025.71 / PHP 8.2` |
| Estado de manifiesto | `Requiere ajuste menor de manifiesto` |
| Rama operativa | `main` |

## Capacidades principales

- Muestra el total de articulos en documentos de venta y compra.
- Inyecta el dato agregado directamente en cabeceras documentales.
- No necesita tablas propias y se integra mediante mods ligeros.
- Sirve como ajuste operativo minimo sobre la visualizacion del ERP.

## CI/CD

| Evento | Flujo | Resultado |
| --- | --- | --- |
| `push` a `main` u otra rama | `Tests` | Ejecuta `lint de PHP y validacion de empaquetado` y valida el repo antes de publicar. |
| `pull_request` | `Tests` | Valida el cambio sin publicar artefactos. |
| `tag vX.Y` | `Tests` + `Release Plugin` | Si `Tests` pasa, genera release de prod y sube el ZIP con `BEPLY_CI_TOKEN`. |
| `workflow_dispatch` | `Release Plugin` | Permite reintentar la publicacion sobre un SHA ya validado. |

Nota: el candidato `dev` usa `BEPLY_DEV_CI_TOKEN`. Si el secreto no existe, la subida `dev` se omite con aviso y no bloquea el workflow.
