FROM postgres:13 AS stage

RUN apt-get update
RUN DEBIAN_FRONTEND=noninteractive apt-get install -y apt-utils
RUN DEBIAN_FRONTEND=noninteractive apt-get install -y postgresql-13-pldebugger


#docker build -t nilbertooliveira/postgres:latest .
