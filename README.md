# RaceClock

### THIS REPOSITORY IS OBSOLETE. FOR THE CURRENT APPLICATON, PLEASE SEE [chandlerswift/racing-web](https://github.com/chandlerswift/racing-web).

### Usage
To spin up an empty web UI:

```bash
docker run chandlerswift/raceclock:latest
```

To spin up a web UI with sample data populated:

```
docker run chandlerswift/raceclock:sample-data
```

This is intended to be run on a Raspberry Pi with custom hardware, and
performs both the timing and the leaderboard functionality. This has
since been separated out to
[chandlerswift/racing-web](https://github.com/chandlerswift/racing-web)
and to a not-developed-at-the-time-of-this-writing data provider/sensor
system.
