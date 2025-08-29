//Metodo de inicio de la aplicación
import 'dart:io';

void main() {
  mostrarMenu();
}

void mostrarMenu() {
  int opcion = -1;
  while (opcion != 0) {
    print("1 => Tipos de datos");
    print("2 => Uso de for");
    print("3 => Uso de while");
    print("4 => Uso de Dowhile");
    print("0 => Salir");
    stdout.write("Seleccione una opción: ");
    opcion = int.parse(stdin.readLineSync().toString());
    switch (opcion) {
      case 1:
        tiposDato();
      case 2:
        usofor();
      case 3:
        usowhile();
      case 4:
        usoDoWhile();
      case 0:
        print("Cerrando la aplicación");
        break;
      default:
        print("Opción no válida");
    }
  }
}

void tiposDato() {
  String
  nombreAlumno; //Declaracion Explicita: Tipo de dato + Nombre + Asignacion
  double
  promedioGeneral; //Declaracion Explicita: Tipo de dato + Nombre + Asignacion

  print("Mensaje en consola");
  stdout.writeln("Registro de notas de los alumnos"); //Mensaje en consola
  print("");
  stdout.writeln(
    "Ingrese el nombre del alumno: ",
  ); //writeln: Agrega salto de linea
  nombreAlumno = stdin
      .readLineSync()
      .toString(); //Asignacion de valor a la variable
  stdout.write(
    "Ingrese el promedio general: ",
  ); //write: No agrega salto de linea
  promedioGeneral = double.parse(
    stdin.readLineSync().toString(),
  ); //Asignacion de valor a la variable

  print("------------------------");

  print("Alunmo: " + nombreAlumno);
  print("Promedio: " + promedioGeneral.toString());
}

void usofor() {
  print("Listado de Aliumnos usando FOR");
  String nombreAlumno;
  List<String> alumnos = []; //Declaracion de una lista
  stdout.writeln("¿Cuántos registros quieres agregar?: ");
  int cantidadRegistros = int.parse(stdin.readLineSync().toString());

  for (var i = 0; i < cantidadRegistros; i++) {
    stdout.write("Ingrese el nombre del alumno: ");
    nombreAlumno = stdin.readLineSync().toString();
    alumnos.add(nombreAlumno); //Agregar un elemento a la lista
  }

  for (var item in alumnos) {
    print("Alumno: " + item.toString());
  }
}

void usowhile() {
  print("Listado de Alumnos usando WHILE");
  String nombreAlumno;
  List<String> listado = [];
  String respuesta = "S";

  while (respuesta.toUpperCase() == "S") {
    stdout.write("Ingrese el nombre del alumno: ");
    nombreAlumno = stdin.readLineSync().toString();
    listado.add(nombreAlumno);
    stdout.writeln("¿Desea agregar otro registro? ");
    respuesta = stdin.readLineSync().toString();
  }

  for (var item in listado) {
    print("Alumno: $item");
  }
}

void usoDoWhile() {
  print("Listado de Alumnos usando DO-WHILE");
  String nombreAlumno;
  List<String> listado = [];
  String respuesta;

  do {
    stdout.write("Ingrese el nombre del alumno: ");
    nombreAlumno = stdin.readLineSync().toString();
    listado.add(nombreAlumno);
    stdout.writeln("¿Desea agregar otro registro? ");
    respuesta = stdin.readLineSync().toString();
  } while (respuesta.toUpperCase() == "S");

  for (var item in listado) {
    print("Alumno: $item");
  }
}