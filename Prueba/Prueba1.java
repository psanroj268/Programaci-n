public class Prueba1 {

    public static void main(String[] args) {
        
        String palabra = "x";
        String palabra2 = "y";
        int longitud = 0;
        int longitud2 = 0;
        int x = 0;
        int y = 0;
        char letra1;
        char letra2;

        System.out.println("Por favor introduzca una palabra: ");
        palabra = System.console().readLine();

        System.out.println();

            longitud = palabra.length();

            longitud2 = palabra.length();

            longitud = longitud / 2;

            palabra2 = palabra;

        do {

            letra1 = palabra2.charAt(x);
            letra2 = palabra.charAt(longitud2 - 1);

            if (letra1 == letra2) {
                x++;
                longitud2--;
            } else if (letra1 != letra2){
                y = -1;
                break;
            }

        } while (x < longitud);

        if (y != -1){
            System.out.println("La palabra es palíndroma");
        } else {
            System.out.println("La palabra no es palíndroma");
        }
    }
}