package designpattern;

import java.util.Scanner;

public class Main {
	private int yes;
	public void displayMenu() {
		do {
			Scanner sc=new Scanner(System.in);
			System.out.println("1.Samsung\n2.Nokia\n3.MI\n4.Apple\n5.OPPO\n6.Asus\n7.Vivo");
			System.out.println();
			System.out.print("enter your choice[1-7]:");
			int choice=sc.nextInt();
            FactoryDesignPattern factory=new FactoryDesignPattern();
            CellPhone cellPhone=factory.getObject(choice);
            
			switch(choice) {
			case 1:
				cellPhone.menu();
				break;
			case 2:
				cellPhone.menu();
				break;
			case 3:
				cellPhone.menu();
				break;
			case 4:
				cellPhone.menu();
				break;
			case 5:
				cellPhone.menu();
				break;
			case 6:
				cellPhone.menu();
				break;
			case 7:
				cellPhone.menu();
				break;

			default:
				System.out.println("You have entered wrong choice,\n"
						+ "Please enter valid choice");

			}
			System.out.println();
			System.out.println("Press 1 for main menu:");
			try {
			yes=sc.nextInt();
			}
			catch(Exception e) {
				System.out.println("enter only digit");
			}
		}
		while(yes==1);
	}

	public static void main(String[] args) {
		Main m=new Main();
		m.displayMenu();

	}


}
