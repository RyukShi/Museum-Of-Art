from pandas import read_csv
from sqlalchemy import create_engine, MetaData, Table

disk_engine = create_engine("{server}+{dialect}://{username}:{password}@{host}:{port}/{database}".format(
    server='postgresql',
    dialect='psycopg2',
    host='localhost',
    username='postgres',
    password='postgresql',
    port='5432',
    database='museum-of-art'
), pool_recycle=14400)

dtype_option = {
    "Gallery Number": str,
    "AccessionYear": str,
    "Culture": str,
    "Period": str,
    "Dynasty": str,
    "Reign": str,
    "Portfolio": str,
    "Geography Type": str,
    "City": str,
    "State": str,
    "County": str,
    "Country": str,
    "Region": str,
    "Subregion": str,
    "Locale": str,
    "Locus": str,
    "Excavation": str,
    "River": str,
    "Classification": str,
    "Rights and Reproduction": str
}

df = read_csv(
    "C:\\Users\\aurel\\Documents\\MetObjects.csv",
    dtype=dtype_option,
    encoding="utf-8")

# delete unnecessary columns
df.drop(
    [
        "Object Number", "Is Timeline Work", "Object ID", "Gallery Number",
        "Portfolio", "Constituent ID", "Artist Prefix", "Artist Suffix",
        "Artist ULAN URL", "Credit Line", "Geography Type", "County",
        "Locale", "Locus", "River", "Metadata Date", "Repository", "Tags",
        "Tags AAT URL", "Tags Wikidata URL", "Rights and Reproduction"
    ], axis=1, inplace=True)

# drop rows where either the Title, Object Name, ... column has a null
df.dropna(subset=[
    "Title", "Object Name", "Artist Display Name",
    "Artist Begin Date", "Artist End Date", "Classification"], inplace=True)

print(df.info())

cities = df["City"].value_counts().to_dict()
classifications = df["Classification"].value_counts().to_dict()
countries = df["Country"].value_counts().to_dict()
cultures = df["Culture"].value_counts().to_dict()
departments = df["Department"].value_counts().to_dict()
dynasties = df["Dynasty"].value_counts().to_dict()
excavations = df["Excavation"].value_counts().to_dict()
periods = df["Period"].value_counts().to_dict()
regions = df["Region"].value_counts().to_dict()
reigns = df["Reign"].value_counts().to_dict()
states = df["State"].value_counts().to_dict()
subregions = df["Subregion"].value_counts().to_dict()


def unique(d: dict):
    unique_set = set()
    for key in d.keys():
        if '|' in key:
            for el in key.split("|"):
                unique_set.add(el.lower())
        else:
            unique_set.add(key.lower())
    return list(unique_set)


data = {
    "city": unique(cities),
    "classification": unique(classifications),
    "country": unique(countries),
    "culture": unique(cultures),
    "department": unique(departments),
    "dynasty": unique(dynasties),
    "excavation": unique(excavations),
    "period": unique(periods),
    "region": unique(regions),
    "reign": unique(reigns),
    "state": unique(states),
    "subregion": unique(subregions)
}

artists = df["Artist Display Name"].value_counts().to_dict()
print(f"Total number of artists: {len(unique(artists))}")


def insert_process():
    with disk_engine.connect() as conn:
        with conn.begin():
            metadata = MetaData()
            for table_name, rows in data.items():
                table = Table(table_name, metadata, autoload_with=disk_engine)
                for row in rows:
                    stmt = table.insert().values(name=row)
                    conn.execute(stmt)
