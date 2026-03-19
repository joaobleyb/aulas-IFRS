import pytest
from mod_jvbb2004 import cripto_cesar, decripto_cesar, conta_caracteres_diferentes

def test_criptar():
    assert cripto_cesar("ABC", 3) == "DEF"
