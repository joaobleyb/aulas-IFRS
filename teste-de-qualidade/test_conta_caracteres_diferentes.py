import pytest
from mod_jvbb2004 import conta_caracteres_diferentes

# Casos Tipicos: 

def test_conta_caracteres_basico():
    assert conta_caracteres_diferentes("abc") == 3

def test_conta_caracteres_repetidos():
    assert conta_caracteres_diferentes("aabbcc") == 3

def test_conta_caracteres_maiusculas_minusculas():
    assert conta_caracteres_diferentes("AaBbCc") == 3

def test_conta_caracteres_palavra():
    assert conta_caracteres_diferentes("banana") == 3 

def test_conta_caracteres_frase():
    assert conta_caracteres_diferentes("ola mundo") == 7

def test_conta_caracteres_simbolos():
    assert conta_caracteres_diferentes("a1!a1!") == 3

# Casos de borda:

def test_conta_caracteres_string_vazia():
    assert conta_caracteres_diferentes("") == 0

def test_conta_caracteres_apenas_espacos():
    assert conta_caracteres_diferentes("     ") == 0

def test_conta_caracteres_um_caractere():
    assert conta_caracteres_diferentes("a") == 1

def test_conta_caracteres_um_caractere_repetido():
    assert conta_caracteres_diferentes("aaaaa") == 1

def test_conta_caracteres_com_muitos_espacos():
    assert conta_caracteres_diferentes("   a   a   ") == 1

def test_conta_caracteres_simbolos_repetidos():
    assert conta_caracteres_diferentes("!!!") == 1

# Exceções: (Utilizando pytest.raises)

import pytest

def test_conta_caracteres_none():
    with pytest.raises(AttributeError):
        conta_caracteres_diferentes(None)

def test_conta_caracteres_int():
    with pytest.raises(AttributeError):
        conta_caracteres_diferentes(123)

def test_conta_caracteres_float():
    with pytest.raises(AttributeError):
        conta_caracteres_diferentes(5.5)

# Casos Tipicos com parametrize: (Mesmos Casos de Tipicos acima, mas usando parametrize)

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

# Casos de borda com parametrize: (Mesmos Casos de Bordas acima, mas usando parametrize)

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

# Exceções com parametrize: (Mesmos Casos de Exceções acima, mas usando parametrize)

@pytest.mark.parametrize("mensagem", [
    None,                       # None
    123,                        # Inteiro
    5.5                         # Float
])
def test_conta_caracteres_excecao_parametrizado(mensagem):
    with pytest.raises(AttributeError):
        conta_caracteres_diferentes(mensagem)