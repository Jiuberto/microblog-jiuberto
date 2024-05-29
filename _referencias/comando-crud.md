# Operações CRUD

## Resumo

- C: CREATE (INSERT) -> inserir dados
- R: READ (SELECT)   -> ler/carregar dados
- U: UPDATE (UPDETE) -> arualizar dados
- D: DELETE (DELETE) -> excluir dados

#   Exemplos

### INSERT na tabela de usuários

```sql
INSERT INTO usuarios(nome, email, senha, tipo)
VALUES('Jiuberto', 'jiub@gmail.com', '123senac', 'admin');
```

```sql
INSERT INTO usuarios(nome, email, senha, tipo)
VALUES('Anakim', 'sky@gmail.com', '123segnac', 'editor');
```

```sql
INSERT INTO usuarios(nome, email, senha, tipo)
VALUES('Aragorn', 'gondor@gmail.com', '12segnac', 'editor');
```

### SELECT na tabela de usuário

```sql
SELECT nome, email FROM usuarios;
```

```sql
SELECT nome, email FROM usuarios WHERE tipo = 'admin';
```

```sql
SELECT * FROM usuarios WHERE id > 1;
```

### UPDATE na tabela de usuários

```sql
UPDATE usuarios SET tipo = 'editor'
WHERE id = 1;
```

<!-- Obs: nunca esquece de passar, pwelo menos, ua condição para o UPDATE -->

### Delete na tabela de usuários

```sql
DELETE FROM usuarios WHERE id = 2;

-- OBS: NUNCA esqueça de passar pelo menos uma condição para o DELETE!
```

```sql
INSERT INTO usuarios(nome, email, senha, tipo)
VALUES('Jiu', 'jb1@gmail.com', '123senac', 'admin');
```

```sql
INSERT INTO usuarios(nome, email, senha, tipo)
VALUES('Edmundo', 'ED@gmail.com', '123senac', 'editor');
```

```sql
SELECT nome, tipo, id FROM usuarios;
```

## Exemplo para tabela de noticias

### Inserir notícias

```sql
INSERT INTO noticias(titulo, texto, resumo, imagem, usuario_id)
Values(
    'Meu pai ganhou na mega-sena',
    'E perdeu',
    'vai tentar de novo',
    'premio.jpg',
    1

)
```

```sql
INSERT INTO noticias(titulo, texto, resumo, imagem, usuario_id)
Values(
    'lorem',
    'bla bla',
    'biscoitp',
    'premio.jpg',
    4
)
```

```sql
INSERT INTO noticias(titulo, texto, resumo, imagem, usuario_id)
Values(
    'lorem',
    'ble ble ble',
    'bolacha',
    'premio.jpg',
    3
)
```

### Select em noticias

```sql
SELECT titulo, data FROM notcias; 
```

```sql
SELECT titulo, data FROM notcias ORDER BY data DESC; 
-- Usamos o ORDER BY data DESC para classificar em ordem
-- decrescente pela data
```

### SELECT com JOIN (consulta com junção de tabelas)

**Objetivo:** realizar uma consulta que mostre a data e o título da noticia **e** o nome de autor da noticia.

```sql
-- Selecionando as colunas indicando as tabelas em que estão
SELECT
    noticias.data,
    noticias.titulo,
    usuarios.nome

-- Especificando as tabelas que serão "juntadas/combinadas" 
FROM noticias JOIN usuarios

-- Critério da junção/relação entre as tabelas
-- Usamos as referencias de FK e PK
ON noticias.usuario_id = usuarios.id;
```

