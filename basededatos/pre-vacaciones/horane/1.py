numlist=[5,2,400,54,7656,23,68,35443,654,2,456,56,3,2,1]

for y in range(0,len(numlist)-1):
    for x in range(0,len(numlist)-1):
        if numlist[x]>numlist[x+1]:
            num1=numlist[x]
            num2=numlist[x+1]
            numlist[x]=num2
            numlist[x+1]=num1
    print(numlist)