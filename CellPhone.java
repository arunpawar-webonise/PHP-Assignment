package designpattern;

import java.util.Scanner;

public abstract class CellPhone {
	Scanner sc=new Scanner(System.in);
	public void mms() {
		System.out.println("enter mms:");
		String message=sc.nextLine();
		System.out.println(message);



	}
	public void sms() {
		System.out.println("enter sms:");
		String message=sc.nextLine();
		System.out.println(message);

	}

	public void phoneDial() {
		System.out.println("enter contact number:");
		String contactNumber=sc.next();
		if(contactNumber.length()!=10) {
			System.out.println("enter exact 10 digits");
		}
		else if(contactNumber.matches("[0-9]{10}")) {
			System.out.println("Successfully called");
		}
		else {
			System.out.println("enter only digits");
		}
	}
	public abstract void menu();
	public abstract void about();

}
