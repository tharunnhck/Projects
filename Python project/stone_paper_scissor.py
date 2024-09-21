#program for the game - 'stone-paper-scissor' 

import random

#function to take input from user and to play with the bot and to calculate the points.
#This is a point system function that calculates points and takes input from user as well
def point_system():
    player_points=0
    cpu_points=0
    list=['Stone','Paper','scissor']
    for i in range(1,6):
        print()
        print("Round {} ".format(i))
        
        try:
            choice=int(input("Enter the choice : "))
            if choice>3:
                raise ValueError

        except:
            print()
            print("invalid input")
            print()
            try:
                choice=int(input("Enter the choice (1,2,3): "))
                if choice>3:
                    raise ValueError
            except:
                print("Too many invalid inputs run the program again !!!")
                print(exit)
                exit()
            else:
                continue
               
        finally:
            cpu_choice=random.randrange(1,4)

       
            print("Player -> {}    CPU -> {}".format(list[choice-1],list[cpu_choice-1]))
            if choice==cpu_choice:
                print("Round draw")
        
            elif choice==1 and cpu_choice==2:
                print("Cpu wins the round")
                cpu_points = cpu_points + 1
            elif choice==1 and cpu_choice==3:
                print("Player wins the round")
                player_points = player_points + 1
        
            elif choice==2 and cpu_choice==1:
                print("Player wins the round")
                player_points = player_points + 1
            elif choice==2 and cpu_choice==3:
                print("Cpu wins the round")
                cpu_points = cpu_points + 1

            elif choice==3 and cpu_choice==1:
                print("Cpu wins the round")
                cpu_points = cpu_points + 1
            elif choice==3 and cpu_choice==2:
                print("Player wins the round")
                player_points = player_points + 1


    return player_points,cpu_points

        
#Function to display the final scores of the player and cpu after the end of 5 rounds
def final_score(player_points,cpu_points):
    if player_points > cpu_points:
        print()
        print("Player Wins the game")
        print("Player      CPU")
        print("  {}         {}".format(player_points,cpu_points))
    elif player_points < cpu_points:
        print()
        print("CPU Wins the game")
        print("Player      CPU")
        print("  {}         {}".format(player_points,cpu_points))
    else:
        print()
        print("The Game is draw")
        print("Player      CPU")
        print("  {}         {}".format(player_points,cpu_points))

    


#beginning of program
print()
print("The best of 5 Rounds Wins")
print("The choices are:   1)stone   2)paper  3)scissor")
print()

player_points, cpu_points = point_system()

final_score(player_points,cpu_points)

    


        
        
