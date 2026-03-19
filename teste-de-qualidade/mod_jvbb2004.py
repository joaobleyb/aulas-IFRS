"""

Funções:
1) cripto_cesar(mensagem, k): cifra de César (apenas letras A-Z e a-z). Shift k posições.
2) decripto_cesar(mensagem, k): inverte a cifra de César.
3) conta_caracteres_diferentes(mensagem): retorna número de caracteres únicos (ignora apenas espaços).
"""

def cripto_cesar(mensagem, k):
    """
    Desloca caracteres alfabéticos (A-Z e a-z) em k posições. Não altera outros chars.
    """
    resultado = []
    for ch in mensagem:
        if ch.isalpha():
            base = 'A' if ch.isupper() else 'a'
            pos = ord(ch) - ord(base)
            nova_pos = (pos + k) % 26
            resultado.append(chr(ord(base) + nova_pos))
        else:
            resultado.append(ch)
    return "".join(resultado)

def decripto_cesar(mensagem, k):
    """
    Desfaz a cifra de César com a mesma chave k.
    """
    return cripto_cesar(mensagem, -k)

def conta_caracteres_diferentes(mensagem):
    """
    Considera todos os caracteres exceto espaços em branco,
    contando as variações em minúsculo/maiúsculo como iguais (unifica em lower()).
    """
    sem_espacos = mensagem.replace(" ", "")
    conjunto = set(ch.lower() for ch in sem_espacos)
    return len(conjunto)
