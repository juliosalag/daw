# Comandos GIT

## Cambio de rama

**Ver tu rama actual**
```
git branch
```
**Ver todas las ramas del repositorio**
```
git branch -a
```
**Cambiar de rama**
```
git checkout {nombre_rama}
```

## Subir cambios

**Añadir cambios al commit**
```
git add .
```
**Hacer un nuevo commit**
```
git commit -m "{nombre_commit}"
 ```
**Subir commits al repositorio**
```
git push
```

## Otros comandos útiles

**Ver el estado de los archivos**
```
git status
```

## Subir cambios a otra rama

**Pasito a pasito**
```
git checkout {nombre_rama_a_la_que_quiero_subir_cambios}
git pull

git checkout {nombre_de_mi_rama}
git merge {nombre_rama_a_la_que_quiero_subir_cambios}
```