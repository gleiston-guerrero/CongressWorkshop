#include <Servo.h>
#include <SoftwareSerial.h>
Servo servo;
int sensor = 12;
int estado;
//SoftwareSerial ModBluetooth(0, 1); // RX | TX 

//COnfiguro la entrada, salida y posicion del servo
void setup() {
// ModBluetooth.begin(9600); 
    Serial.begin(9600);  
   // ModBluetooth.println("MODULO CONECTADO");  
   // ModBluetooth.print("#"); 
//servo.attach(3);
//servo.attach(4);
//servo.attach(5);
//servo.attach(6);
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
    servo.write(80);
    delay(500);
    servo.write(10);
    delay(500);
    }
    if( input == '2'){ //estado ==LOW || input == '2'
   // servo.attach(3);
   pinMode(sensor,INPUT);
   servo.attach(8);
    servo.write(100);
    delay(500);
    servo.write(-80);
    delay(500);
    }
   if( input == '3'){ //estado ==LOW || input == '2'
   // servo.attach(3);
   pinMode(sensor,INPUT);
   servo.attach(5);
    servo.write(100);
    delay(500);
    servo.write(-80);
    delay(500);
    }
     if( input == '4'){ //estado ==LOW || input == '2'
   // servo.attach(3);
   pinMode(sensor,INPUT);
   servo.attach(13);
    servo.write(100);
    delay(500);
    servo.write(-100);
    delay(500);
    }
   }
  }
