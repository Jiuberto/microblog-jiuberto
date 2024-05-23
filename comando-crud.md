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