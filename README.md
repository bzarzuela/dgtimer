# Donut Garage Lap Timer

This is the current version of the lap timer, designed for Donut Garage events.

## Race
A race represents an event where drivers and runs are recorded. 
It has a name, could be something like "86 Day 2024 Practice 1"
or "86 Day 2024 Official".
You can define how much time is added per penalty for every race.

## Driver
Every race has a unique list of participants or Drivers. Each Driver has a name
and a car number. 

## Run
Each timed run is associated with a Race and a Driver. The total time 
elapsed is recorded and the count of penalties will be multiplied by the
time per penalty value of a Race to compute for the total time elapsed.
