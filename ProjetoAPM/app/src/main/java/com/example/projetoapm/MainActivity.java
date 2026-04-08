package com.example.projetoapm;

import android.Manifest;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.os.Bundle;
import android.speech.RecognizerIntent;
import android.speech.tts.TextToSpeech;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.Locale;

import androidx.activity.EdgeToEdge;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;
import androidx.core.graphics.Insets;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowInsetsCompat;

import com.google.mlkit.nl.translate.TranslateLanguage;
import com.google.mlkit.nl.translate.Translator;
import com.google.mlkit.nl.translate.Translation;
import com.google.mlkit.nl.translate.TranslatorOptions;
import com.google.mlkit.common.model.DownloadConditions;

public class MainActivity extends AppCompatActivity {

    TextToSpeech tts;
    EditText entrada;
    TextView traducao;
    Spinner spinnerSource, spinnerTarget;
    Translator translator;

    private final String[] nomesIdiomas = {"Português", "Inglês", "Espanhol", "Francês", "Alemão", "Italiano"};
    private final String[] codigosIdiomas = {
            TranslateLanguage.PORTUGUESE,
            TranslateLanguage.ENGLISH,
            TranslateLanguage.SPANISH,
            TranslateLanguage.FRENCH,
            TranslateLanguage.GERMAN,
            TranslateLanguage.ITALIAN
    };

    private static final int REQUEST_CODE_SPEECH_INPUT = 100;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        EdgeToEdge.enable(this);
        setContentView(R.layout.activity_main);

        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main), (v, insets) -> {
            Insets systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars());
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom);
            return insets;
        });

        if (ContextCompat.checkSelfPermission(this, Manifest.permission.RECORD_AUDIO)
                != PackageManager.PERMISSION_GRANTED) {
            ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.RECORD_AUDIO}, 1);
        }

        entrada = findViewById(R.id.editTextText);
        traducao = findViewById(R.id.textViewTraducao);
        spinnerSource = findViewById(R.id.spinnerSource);
        spinnerTarget = findViewById(R.id.spinnerTarget);

        ArrayAdapter<String> adapter = new ArrayAdapter<>(this,
                android.R.layout.simple_spinner_item, nomesIdiomas);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);

        spinnerSource.setAdapter(adapter);
        spinnerTarget.setAdapter(adapter);

        spinnerSource.setSelection(0); // Português
        spinnerTarget.setSelection(1); // Inglês

        AdapterView.OnItemSelectedListener listener = new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                configurarTradutor();
                atualizarIdiomaTTS();
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {}
        };

        spinnerSource.setOnItemSelectedListener(listener);
        spinnerTarget.setOnItemSelectedListener(listener);

        tts = new TextToSpeech(this, status -> {
            if (status == TextToSpeech.SUCCESS) {
                atualizarIdiomaTTS();
            }
        });
    }

    private void configurarTradutor() {
        if (translator != null) {
            translator.close();
        }

        String sourceCode = codigosIdiomas[spinnerSource.getSelectedItemPosition()];
        String targetCode = codigosIdiomas[spinnerTarget.getSelectedItemPosition()];

        TranslatorOptions options = new TranslatorOptions.Builder()
                .setSourceLanguage(sourceCode)
                .setTargetLanguage(targetCode)
                .build();

        translator = Translation.getClient(options);

        DownloadConditions conditions = new DownloadConditions.Builder()
                .requireWifi()
                .build();

        translator.downloadModelIfNeeded(conditions);
    }

    private void atualizarIdiomaTTS() {
        if (tts != null) {
            int position = spinnerTarget.getSelectedItemPosition();
            Locale locale = getLocaleFromCode(codigosIdiomas[position]);
            tts.setLanguage(locale);
        }
    }

    private Locale getLocaleFromCode(String code) {
        switch (code) {
            case TranslateLanguage.PORTUGUESE: return new Locale("pt", "BR");
            case TranslateLanguage.ENGLISH: return Locale.US;
            case TranslateLanguage.SPANISH: return new Locale("es", "ES");
            case TranslateLanguage.FRENCH: return Locale.FRANCE;
            case TranslateLanguage.GERMAN: return Locale.GERMANY;
            case TranslateLanguage.ITALIAN: return Locale.ITALY;
            default: return new Locale(code);
        }
    }

    public void inverterIdiomas(View view) {
        int sourcePos = spinnerSource.getSelectedItemPosition();
        int targetPos = spinnerTarget.getSelectedItemPosition();

        spinnerSource.setSelection(targetPos);
        spinnerTarget.setSelection(sourcePos);

        entrada.setText("");
        traducao.setText("");
    }

    public void falarEntrada(View view) {
        Intent intent = new Intent(RecognizerIntent.ACTION_RECOGNIZE_SPEECH);
        intent.putExtra(RecognizerIntent.EXTRA_LANGUAGE_MODEL, RecognizerIntent.LANGUAGE_MODEL_FREE_FORM);
        
        // Pega o idioma selecionado no Spinner da Esquerda (Fonte)
        int position = spinnerSource.getSelectedItemPosition();
        String sourceLangTag = getSpeechTagFromCode(codigosIdiomas[position]);
        
        intent.putExtra(RecognizerIntent.EXTRA_LANGUAGE, sourceLangTag);
        intent.putExtra(RecognizerIntent.EXTRA_LANGUAGE_PREFERENCE, sourceLangTag);
        intent.putExtra(RecognizerIntent.EXTRA_ONLY_RETURN_LANGUAGE_PREFERENCE, sourceLangTag);

        try {
            startActivityForResult(intent, REQUEST_CODE_SPEECH_INPUT);
        } catch (Exception e) {
            Toast.makeText(this, "Erro ao iniciar reconhecimento de voz", Toast.LENGTH_SHORT).show();
        }
    }

    private String getSpeechTagFromCode(String code) {
        switch (code) {
            case TranslateLanguage.PORTUGUESE: return "pt-BR";
            case TranslateLanguage.ENGLISH: return "en-US";
            case TranslateLanguage.SPANISH: return "es-ES";
            case TranslateLanguage.FRENCH: return "fr-FR";
            case TranslateLanguage.GERMAN: return "de-DE";
            case TranslateLanguage.ITALIAN: return "it-IT";
            default: return code;
        }
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (requestCode == REQUEST_CODE_SPEECH_INPUT && resultCode == RESULT_OK && data != null) {
            ArrayList<String> result = data.getStringArrayListExtra(RecognizerIntent.EXTRA_RESULTS);
            if (result != null && !result.isEmpty()) {
                entrada.setText(result.get(0));
            }
        }
    }

    public void falarTraducao(View view) {
        String texto = traducao.getText().toString();
        if (!texto.isEmpty()) {
            tts.speak(texto, TextToSpeech.QUEUE_FLUSH, null, null);
        }
    }

    public void traduzir(View view) {
        String texto = entrada.getText().toString();
        if (texto.isEmpty()) return;

        translator.translate(texto)
                .addOnSuccessListener(traduzido -> traducao.setText(traduzido))
                .addOnFailureListener(e -> traducao.setText("Erro na tradução"));
    }

    @Override
    protected void onDestroy() {
        if (translator != null) translator.close();
        if (tts != null) {
            tts.stop();
            tts.shutdown();
        }
        super.onDestroy();
    }
}