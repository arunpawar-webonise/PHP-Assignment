package designpattern;

import java.util.Scanner;

public final class PayApp {
	private String fName,lName,yes;
	private int pin;
	private double balance;
	private static PayApp payApp=null;
	private PayApp(){
		
	}
	public static PayApp getObject() {
		if(payApp==null) {
			return new PayApp();
		}
		return payApp;
	}
	Scanner sc=new Scanner(System.in);
	public void payApp() {
		do {
			System.out.println();
			System.out.println("1.Register\n2.Balance Enquiry\n3.Deposit\n4.Withdraw\n5.Paid");
			System.out.println();
			System.out.println("enter your choice[1-5]:");
			int choice=sc.nextInt();
			switch(choice) {
			case 1:
				System.out.println("enter first name:");
				fName=sc.next();
				System.out.println("enter last name:");
				lName=sc.next();
				System.out.println("enter pin:");
				pin=sc.nextInt();
				if(fName==null || lName==null || pin==0) {
					System.out.println("Failed");

				}
				else {
					System.out.println("Successfully Registered");
				}

				break;
			case 2:
				System.out.println("enter pin");
				int enquiryPin=sc.nextInt();
				if(pin==enquiryPin) {
					System.out.println("Available Balance is "+balance);
				}
				else {
					System.out.println("Wrong pin");
				}

				break;

			case 3:
				System.out.println("enter pin:");
				int depositPint=sc.nextInt();
				if(depositPint==pin) {
					System.out.println("enter amount to deposit:");
					double depositBalance=sc.nextDouble();
					if(depositBalance>0) {
						balance=balance+depositBalance;
						System.out.println(balance+" Deposited Successfully");
					}
					else {
						System.out.println("Thank you!!!");
					}
				}
				else {
					System.out.println("Wrong Pin");
				}
				break;
			case 4:
				System.out.println("enter pin:");
				int inquiryPin=sc.nextInt();
				if(inquiryPin==pin) {
					System.out.println("enter amout to withdraw:");
					double withdrawAmt=sc.nextDouble();
					if(withdrawAmt<=balance) {
						balance=balance-withdrawAmt;
						System.out.println("Successfully withdrawn "+withdrawAmt);
					}
					else {
						System.out.println("You have insufficent balance");
					}
				}
				else {
					System.out.println("Wrong Pin");
				}
				break;
			case 5:
				System.out.println("enter pin:");
				int paidPin=sc.nextInt();
				if(paidPin==pin) {
					System.out.println("enter name to whom you want to pay:");
					String name=sc.next();
					System.out.println("enter amount to pay:");
					double amt=sc.nextDouble();
					if(amt<=balance) {
						System.out.println(amt+" paid Successfully to "+name);
						balance=balance-amt;
						}
					else {
						System.out.println("Your have insufficent balance");
					}
					
				}
				else {
					System.out.println("Wrong Pin");
				}
				break;	
			default:
				System.out.println("Please enter valid choice[1-5]");
			}
			System.out.println();
			System.out.println("Do you want to contine[yes/no]:");
			yes=sc.next();
		}

		while(yes.equalsIgnoreCase("yes"));
	
	}


}
