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