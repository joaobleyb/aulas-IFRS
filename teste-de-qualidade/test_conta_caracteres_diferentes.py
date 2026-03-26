import pytest
from mod_jvbb2004 import conta_caracteres_diferentes

# Casos Tipicos com parametrize:

@pytest.mark.parametrize("mensagem, esperado", [
    ("abc", 3),                 # Caracteres únicos
    ("aabbcc", 3),              # Caracteres repetidos
    ("AaBbCc", 3),              # Maiúsculas e minúsculas
    ("banana", 3),              # Palavra com caracteres repetidos
    ("ola mundo", 7),           # Frase com espaços
    ("a1!a1!", 3)               # Caracteres especiais
])
def test_conta_caracteres_parametrizado(mensagem, esperado):
    assert conta_caracteres_diferentes(mensagem) == esperado

# Casos de borda com parametrize:

@pytest.mark.parametrize("mensagem, esperado", [
    ("", 0),                    # String vazia
    ("     ", 0),               # Apenas espaços
    ("a", 1),                   # Um caractere
    ("aaaaa", 1),               # Um caractere repetido
    ("   a   a   ", 1),         # Muitos espaços
    ("!!!", 1)                  # Símbolos repetidos
])
def test_conta_caracteres_borda_parametrizado(mensagem, esperado):
    assert conta_caracteres_diferentes(mensagem) == esperado

# Exceções com parametrize:

@pytest.mark.parametrize("mensagem", [
    None,                       # None
    123,                        # Inteiro
    5.5                         # Float
])
def test_conta_caracteres_excecao_parametrizado(mensagem):
    with pytest.raises(AttributeError):
        conta_caracteres_diferentes(mensagem)