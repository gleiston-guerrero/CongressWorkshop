#include <Servo.h>
#include <SoftwareSerial.h>
#include <Wire.h>
#include "rgb_lcd.h"

Servo servo;
rgb_lcd lcd;

////Rojo
const int colorR1 = 255;
const int colorG1 = 0;
const int colorB1 = 0;

///Amarillo

const int colorR2 = 255;
const int colorG2 = 240;
const int colorB2 = 0;

/// Verde
const int colorR3 = 0;
const int colorG3 = 255;
const int colorB3 = 0;

// Azul
const int colorR4 = 0;
const int colorG4 = 0;
const int colorB4 = 255;//096


const int ledPIN = 11;
const int ledPIN1 = 13;
int sensor = 12;
int estado;
//SoftwareSerial ModBluetooth(0, 1); // RX | TX 

//COnfiguro la entrada, salida y posicion del servo
void setup() {
// ModBluetooth.begin(9600); 
    Serial.begin(9600);  
    pinMode(ledPIN , OUTPUT);  //
    lcd.begin(16, 2);
    lcd.print("Dispensador de");
    lcd.setCursor(4, 1);
    lcd.print("medicina");
    delay(1000);
   // ModBluetooth.println("MODULO CONECTADO");  
   // ModBluetooth.print("#"); 
    pinMode(sensor,INPUT);
    servo.write(10);
}

//Movimiento de los servos
void loop() {
 
   if (Serial.available() > 0)
  {
  //estado =digitalRead(sensor);
  int input = Serial.read();
  if( input == '1'){
    //servo.attach(3);
   pinMode(sensor,INPUT);
   servo.attach(3);
    servo.write(100);
    delay(500);
    servo.write(-80);
    delay(500);
    lcd.clear();
    lcd.setRGB(colorR4, colorG4, colorB4);
    lcd.print("medicina ");
    lcd.setCursor(4, 1);
    lcd.print("dispensada");
  digitalWrite(ledPIN1 , HIGH);   // poner el Pin en HIGH
  delay(1000);                   // esperar un segundo
  digitalWrite(ledPIN1 , LOW);    // poner el Pin en LOW
  delay(1000);                   // esperar un segundo
  //  lcd.print(millis()/1000);
  
    }
    if( input == '2'){ //estado ==LOW || input == '2'
   // servo.attach(3);
    pinMode(sensor,INPUT);
    servo.attach(8);
    servo.write(100);
    delay(500);
    servo.write(-80);
    delay(500);
    lcd.clear();
    lcd.setRGB(colorR3, colorG3, colorB3);
    lcd.print("medicina ");
    lcd.setCursor(4, 1);
    lcd.print("dispensada"); 
    }
   if( input == '3'){ //estado ==LOW || input == '2'
   // servo.attach(3);
    pinMode(sensor,INPUT);
    servo.attach(5);
    servo.write(150);
    delay(500);
    servo.write(-80);
    delay(500);
    lcd.clear();
    lcd.setRGB(colorR1, colorG1, colorB1);
    lcd.print("medicina ");
    lcd.setCursor(4, 1);
    lcd.print("dispensada");
    
  digitalWrite(ledPIN , HIGH);   // poner el Pin en HIGH
  delay(10000);                   // esperar un segundo
  digitalWrite(ledPIN , LOW);    // poner el Pin en LOW
  delay(1000);                   // esperar un segundo
    
    }
     if( input == '4'){ //estado ==LOW || input == '2'
   // servo.attach(3);
    pinMode(sensor,INPUT);
    servo.attach(13);
    servo.write(180);
    delay(500);
    servo.write(-180);
    delay(500);
    lcd.clear();
    lcd.setRGB(colorR2, colorG2, colorB2);
    lcd.print("medicina ");
    lcd.setCursor(4, 1);
    lcd.print("dispensada");
    }
   }
  }
